document.addEventListener("DOMContentLoaded", function () {
    // Ambil semua input yang berkontribusi pada perhitungan
    const inputs = document.querySelectorAll("input");

    // Tambahkan event listener ke setiap input
    inputs.forEach(input => {
        input.addEventListener("input", calculateSFindex);
    });
});



function calculateSFindex() {
   
    
    //Inisiasi Variable/Konstanta
    const t_moist = parseFloat(document.getElementById("t-moist").value) || 0;
    const i_moist = parseFloat(document.getElementById("i-moist").value) || 0;
    const ash_content = parseFloat(document.getElementById("ash-content").value) || 0;
    const volatile_matter = parseFloat(document.getElementById("volatile-matter").value) || 0;
    const fixed_carbon= parseFloat(document.getElementById("fix-carbon").value) || 0;
    const gcv_adb= parseFloat(document.getElementById("gross-cv").value) || 0;
    const gcv_ar= gcv_adb*(100-t_moist)/(100-i_moist);
    const gcv_db= gcv_adb*100/(100-i_moist);
    const total_chlorine = parseFloat(document.getElementById("total-chlorine").value) || 0;
    const total_sulfur = parseFloat(document.getElementById("total-sulfur").value) || 0;
    

    //

    const carbon = parseFloat(document.getElementById("carbon").value) || 0;
    const hydrogen = parseFloat(document.getElementById("hydrogen").value) || 0;
    const nitrogen = parseFloat(document.getElementById("nitrogen").value) || 0;
    const oxygen = 100-carbon-hydrogen-nitrogen-total_sulfur;

    //
    const dt_reducing = parseFloat(document.getElementById("dt-reducing").value) || 0;
    const st_reducing = parseFloat(document.getElementById("st-reducing").value) || 0;
    const ht_reducing = parseFloat(document.getElementById("ht-reducing").value) || 0;
    const ft_reducing = parseFloat(document.getElementById("ft-reducing").value) || 0;

    const dt_oxidizing = parseFloat(document.getElementById("dt-oxidizing").value) || 0;
    const st_oxidizing = parseFloat(document.getElementById("st-oxidizing").value) || 0;
    const ht_oxidizing = parseFloat(document.getElementById("ht-oxidizing").value) || 0;
    const ft_oxidizing = parseFloat(document.getElementById("ft-oxidizing").value) || 0;
    //
    const SiO2 = parseFloat(document.getElementById("SiO2").value) || 0;
    const Al2O3 = parseFloat(document.getElementById("Al2O3").value) || 0;
    const Fe2O3 = parseFloat(document.getElementById("Fe2O3").value) || 0;
    const CaO = parseFloat(document.getElementById("CaO").value) || 0;
    const MgO = parseFloat(document.getElementById("MgO").value) || 0;
    const TiO2 = parseFloat(document.getElementById("TiO2").value) || 0;
    const Na2O = parseFloat(document.getElementById("Na2O").value) || 0;
    const K2O = parseFloat(document.getElementById("K2O").value) || 0;
    const Mn3O4 = parseFloat(document.getElementById("Mn3O4").value) || 0;
    const P2O5 = parseFloat(document.getElementById("P2O5").value) || 0;
    const SO3 = parseFloat(document.getElementById("SO3").value) || 0;
    
    // Formula SLAGGING FOULING DAN KOROSI
    // Rumus SLAGGING
    const baseSum = Fe2O3 + CaO + MgO + Na2O + K2O;
    const acidSum = SiO2 + Al2O3 + TiO2;
        
    const baseAcidIndex = baseSum / acidSum; //formula base to acid ratio
    const silica_ratio = 100*SiO2/(SiO2+Fe2O3+CaO+MgO); //formula silica ratio
    const slagging_index = baseAcidIndex*total_sulfur*100/(100-i_moist); //formula slagging index
    const fusibility = (4*dt_reducing+ht_oxidizing)/5;
    const ironperca = Fe2O3/CaO;
    const iron = Fe2O3;
    const ironplusca= Fe2O3+CaO;
    const siperal= SiO2/Al2O3;
    const composite=1.24*baseAcidIndex+0.28*siperal-0.0023*st_oxidizing-0.019*silica_ratio+5.4;
    //Rumus FOULING
    const foulingIndex = baseAcidIndex*Na2O;
    //Na2O in ash
    const batasLow_Na = (Fe2O3 + CaO + MgO < 20) ? 1.2 : 3.0;
     
    //
    const total_alkali= Na2O+K2O;
    const alkali_to_silica = total_alkali/SiO2;
    //Rumus KOROSI
    const chlorine = total_chlorine/10000;
    const spercl= chlorine*32.062/total_sulfur*35.453;
    


    
    document.getElementById("gross-cv-ar").value = gcv_ar.toFixed(0);
    document.getElementById("gross-cv-db").value = gcv_db.toFixed(0);
    document.getElementById("oxygen").value = oxygen.toFixed(2);

    //HITUNG SKOR

    function hitungSkor(hasilkalkulasi, batas_low, batas_high, pilihan) {
        // let skor = (pilihan ? (hasilkalkulasi < batas_low ? 0 : hasilkalkulasi > batas_high ? 1.0 : 0.5) 
        //                     : (hasilkalkulasi > batas_low ? 0 : hasilkalkulasi < batas_high ? 1.0 : 0.5));
    
        let skor;

    switch (pilihan) {
        case "operasikurang":
            if (hasilkalkulasi < batas_low) {
                skor = 0;
            } else if (hasilkalkulasi > batas_high) {
                skor = 1.0;
            } else {
                skor = 0.5;
            }
            break;
        case "notoperasikurang":
            if (hasilkalkulasi > batas_low) {
                skor = 0;
            } else if (hasilkalkulasi < batas_high) {
                skor = 1.0;
            } else {
                skor = 0.5;
            }
            break;
        case "operasior":
            if (hasilkalkulasi < batas_low || hasilkalkulasi > batas_high) {
                skor = 0;
            } 
            else {
                skor = 1;
            }
            break;
        default:
            skor = 0.5; // Default nilai jika pilihan tidak valid
            break;
    }

        return {
            skor,
            innerHTML: skor.toFixed(2),
            classList: skor === 0 ? 'bg-success' : skor === 0.5 ? 'bg-warning' : 'bg-danger'
        };
    }
    
    

    function updateSkor(elementId, hasil) {
        let elemen = document.querySelector(`#${elementId}`);
        if (elemen) {
            elemen.innerHTML = hasil.innerHTML;
            elemen.classList = hasil.classList;
        }
    }


    
  
    
    
    //ARRAY SKORING
    const skorSlaggingIndex = [
    hitungSkor(baseAcidIndex, 0.5, 0.7, "operasikurang"),
    hitungSkor(silica_ratio, 72, 65, "notoperasikurang"),
    hitungSkor(slagging_index, 0.6, 2.0, "operasikurang"),
    hitungSkor(fusibility, 1232, 1343, "notoperasikurang"),
    hitungSkor(ironperca, 0.3, 3.0, "operasior"),
    hitungSkor(iron, 10, 10, "operasikurang"),
    hitungSkor(ironplusca, 23, 23, "operasikurang"),
    hitungSkor(siperal, 0.7, 3.5, "operasior"),
    hitungSkor(composite, 1.5, 2.5, "operasikurang"),
    ];

    const skorFoulingIndex = [
    hitungSkor(foulingIndex, 0.2, 0.5, "operasikurang"),
    hitungSkor(Na2O, batasLow_Na, batasLow_Na+0.01, "operasikurang"),
    hitungSkor(total_alkali, 4, 4.01, "operasikurang"),
    hitungSkor(alkali_to_silica, 0.1, 0.101, "operasikurang")
    ];

    const skorCorrosionIndex = [
        hitungSkor(chlorine, 0.15, 0.35, "operasikurang"),
        hitungSkor(spercl, 2, 4, "notoperasikurang")
    ];

    // Update undefind skor --> class skor

    updateSkor("skor-ba", hitungSkor(baseAcidIndex, 0.5, 0.7, "operasikurang"));
    updateSkor("skor-sr", hitungSkor(silica_ratio, 72, 65, "notoperasikurang"));
    updateSkor("skor-slag-index", hitungSkor(slagging_index, 0.6, 2.0, "operasikurang"));
    updateSkor("skor-fusibility", hitungSkor(fusibility, 1232, 1343, "notoperasikurang"));
    updateSkor("skor-ironperca", hitungSkor(ironperca, 0.3, 3, "operasior"));
    updateSkor("skor-iron", hitungSkor(iron, 10, 10.1, "operasikurang"));
    updateSkor("skor-ironplusca", hitungSkor(ironplusca, 23, 23.1, "operasikurang"));
    updateSkor("skor-siperal", hitungSkor(siperal, 0.7, 3.5, "operasior"));
    updateSkor("skor-composite", hitungSkor(composite, 1.5, 2.5, "operasikurang"));
    updateSkor("skor-fi", hitungSkor(foulingIndex, 0.2, 0.5, "operasikurang"));
    updateSkor("skor-na-ash", hitungSkor(Na2O, batasLow_Na, batasLow_Na+0.01, "operasikurang"));
    updateSkor("skor-total-alkali", hitungSkor(total_alkali, 4, 4.01, "operasikurang"));
    updateSkor("skor-alkali-to-silica", hitungSkor(alkali_to_silica, 0.1, 0.101, "operasikurang"));
    updateSkor("skor-total-klorin", hitungSkor(chlorine, 0.15, 0.35, "operasikurang"));
    updateSkor("skor-spercl", hitungSkor(spercl, 2, 4, "notoperasikurang"));


    //TOTAL-SLAGGING
    const skormap=skorSlaggingIndex.map(item => item.skor);
    const totalSkorSlagging = skormap.reduce((acc, curr) => acc + curr, 0);
    const bagiTotalSkorSlagging = skorSlaggingIndex.length / 3;
    document.getElementById("total-slagging").classList = totalSkorSlagging <= bagiTotalSkorSlagging ? 'bg-success' : totalSkorSlagging >= 2*bagiTotalSkorSlagging ? 'bg-danger' : 'bg-warning';

    //TOTAL-FOULING
    const skorFoulingmap=skorFoulingIndex.map(item => item.skor);
    const totalSkorFouling = skorFoulingmap.reduce((acc, curr) => acc + curr, 0);
    const bagiTotalSkorFouling = skorFoulingIndex.length / 3;
    document.getElementById("total-fouling").classList = totalSkorFouling <= bagiTotalSkorFouling ? 'bg-success' : totalSkorFouling >= 2*bagiTotalSkorFouling ? 'bg-danger' : 'bg-warning';

     //TOTAL-CORROSION
     const skorCorrosionmap=skorCorrosionIndex.map(item => item.skor);
     const totalSkorCorrosion = skorCorrosionmap.reduce((acc, curr) => acc + curr, 0);
     const bagiTotalSkorCorroion = skorCorrosionIndex.length / 3;
     document.getElementById("total-corrosion").classList = totalSkorCorrosion <= bagiTotalSkorCorroion ? 'bg-success' : totalSkorCorrosion >= 2*bagiTotalSkorCorroion ? 'bg-danger' : 'bg-warning';
 

    //Tampilkan HASIL
    function tampilnilai(result_id,result_value){
        document.getElementById(result_id).textContent =`${result_value.toFixed(2)}`;
    }
    
    
    let hasilid = ["result_ba","result_si_ratio", "result_slagging_index", "result_fusibility", "result_ironperca","result_iron","result_ironplusca","result_siperal","result_composite","total-slagging","result_fi","result_na_ash","result_total_alkali", "result_alkali_to_silica","total-fouling","result_total_klorin","result_spercl"];
    let hasilnilai = [baseAcidIndex,silica_ratio,slagging_index,fusibility,ironperca,iron,ironplusca,siperal,composite,totalSkorSlagging,foulingIndex,Na2O,total_alkali,alkali_to_silica,totalSkorFouling,chlorine,spercl];

    for (let i = 0; i < hasilid.length; i++) {
        tampilnilai(hasilid[i],hasilnilai[i]);
    }
    

    


 // CHART AFT

    const labelsAFT = ['DT', 'ST', 'HT', 'FT']; // Label utama (tanpa duplikasi)

    // Data untuk masing-masing kategori
    const reducingData = [dt_reducing, st_reducing, ht_reducing, ft_reducing];
    const oxidizingData = [dt_oxidizing, st_oxidizing, ht_oxidizing, ft_oxidizing];

    // Data untuk chart
    const dataAFT = {
        labels: labelsAFT,
        datasets: [
            {
                label: 'Reducing',
                data: reducingData,
                backgroundColor: 'rgba(75, 192, 192, 0.5)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            },
            {
                label: 'Oxidizing',
                data: oxidizingData,
                backgroundColor: 'rgba(255, 99, 132, 0.5)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1
            }
        ]
    };

    // Konfigurasi chart
    const config = {
        type: 'bar',
        data: dataAFT,
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                x: {
                    ticks: {
                        font: {
                            size: 12
                        }
                    }
                },
                y: {
                    min: 900,  // Menetapkan batas bawah sumbu Y
                    max: 1500, // Menetapkan batas atas sumbu Y
                    ticks: {
                        stepSize: 100 // Menetapkan interval antara nilai pada sumbu Y
                    }
                }
            },
            plugins: {
                tooltip: {
                    callbacks: {
                        title: function(context) {
                            const index = context[0].dataIndex;
                            return `${labelsAFT[index]}`;
                        }
                    }
                },
                legend: {
                    display: true,
                    position: 'top' // Bisa diubah ke 'bottom', 'left', atau 'right'
                }
            },
            animation: {
                duration: 1000,
                easing: 'easeInOutQuart'
            }
        }
    };

    // Render chart
    const myChart = new Chart(
        document.getElementById('myChart'),
        config
    );

        // Ambil section tertentu
        const section = document.getElementById("ringkasan");

        // Ambil semua elemen <p> di dalam section
        const paragraphs = section.querySelectorAll("p");
    
        // Filter hanya yang memiliki ID
        let paragraphIds = Array.from(paragraphs)
        .filter(p => p.id) // Hanya ambil <p> yang memiliki ID
        .map(p => p.id);   // Ambil nilai ID
    
        // paragraphIds[0] :jenis, [1] nama, [2] kode, [3] paragraf
        console.log(paragraphIds);
    
        let ambilringkasan=[
            document.getElementById("input-jenis").value,
            document.getElementById("input-nama").value,
            document.getElementById("input-kode").value,
            56
        ]
        console.log(ambilringkasan);
    
        function tampilringkasan(result_id,result_value){
            document.getElementById(result_id).innerHTML =`${result_value}`;
        }
        for (let i=0;i< paragraphIds.length;i++){
            tampilringkasan(paragraphIds[i],ambilringkasan[i]);
        }
  
    
}

function tampilkanDataRingkasan(){
    
}