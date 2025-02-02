function bukaModal() {
    document.getElementById("myModal").style.display = "block";
}

function closeModal() {
    document.getElementById("myModal").style.display = "none";
}

let selectedData = {};

if (selectedData.jenis === "Batubara" || selectedData.jenis === "Biomassa" || selectedData.jenis === "Campuran" || selectedData.jenis === "Lainnya") {
    selectedData.value = jenis;}

function previewData() {
    var select = document.getElementById("sampel-dropdown");
    var selectedOption = select.options[select.selectedIndex];
    
    selectedData ={
     nama_s : selectedOption.getAttribute("data-nama_s"),
     kode_s: selectedOption.getAttribute("data-kode_s"),
     jenis: selectedOption.getAttribute("data-jenis"),
     total_m: selectedOption.getAttribute("data-total_m"),
     i_mois: selectedOption.getAttribute("data-i_mois"),
     ash_co: selectedOption.getAttribute("data-ash_co"),
     volati: selectedOption.getAttribute("data-volati"),
     fixed_: selectedOption.getAttribute("data-fixed_"),
     total_s: selectedOption.getAttribute("data-total_s"),
     GCV_ad: selectedOption.getAttribute("data-GCV_ad"),
     GCV_ar: selectedOption.getAttribute("data-GCV_ar"),
     GCV_db: selectedOption.getAttribute("data-GCV_db"),
     hgi: selectedOption.getAttribute("data-hgi"),
     carbon: selectedOption.getAttribute("data-carbon"),
     hydrog: selectedOption.getAttribute("data-hydrog"),
     nitrog: selectedOption.getAttribute("data-nitrog"),
     oxygen: selectedOption.getAttribute("data-oxygen"),
     dt_red: selectedOption.getAttribute("data-dt_red"),
     st_red: selectedOption.getAttribute("data-st_red"),
     ht_red: selectedOption.getAttribute("data-ht_red"),
     ft_red: selectedOption.getAttribute("data-ft_red"),
     dt_oxi: selectedOption.getAttribute("data-dt_oxi"),
     st_oxi: selectedOption.getAttribute("data-st_oxi"),
     ht_oxi: selectedOption.getAttribute("data-ht_oxi"),
     ft_oxi: selectedOption.getAttribute("data-ft_oxi"),
     SiO2: selectedOption.getAttribute("data-SiO2"),
     Al2O: selectedOption.getAttribute("data-Al2O"),
     Fe2O: selectedOption.getAttribute("data-Fe2O"),
     CaO: selectedOption.getAttribute("data-CaO"),
     MgO: selectedOption.getAttribute("data-MgO"),
     TiO2: selectedOption.getAttribute("data-TiO2"),
     Na2O: selectedOption.getAttribute("data-Na2O"),
     K2O: selectedOption.getAttribute("data-K2O"),
     Mn3O: selectedOption.getAttribute("data-Mn3O"),
     P2O5: selectedOption.getAttribute("data-P2O5"),
     SO3: selectedOption.getAttribute("data-SO3"),
     total_c: selectedOption.getAttribute("data-total_c")

    };

    document.getElementById("preview-jenis").value = selectedData.jenis;
    document.getElementById("preview-nama_s").value = selectedData.nama_s;
    document.getElementById("preview-kode_s").value = selectedData.kode_s;
    document.getElementById("preview-total_m").value = selectedData.total_m;
    document.getElementById("preview-i_mois").value = selectedData.i_mois;
    document.getElementById("preview-ash_co").value = selectedData.ash_co;
    document.getElementById("preview-gcv_ad").value = selectedData.GCV_ad;


}

function pilihData(event) {
    event.preventDefault();
    document.getElementById("input-nama").value = selectedData.nama_s;
    document.getElementById("input-kode").value = selectedData.kode_s;

    
    document.getElementById("input-jenis").value = selectedData.jenis;    
    document.getElementById("t-moist").value = selectedData.total_m;
    document.getElementById("i-moist").value = selectedData.i_mois;
    document.getElementById("ash-content").value = selectedData.ash_co;
    document.getElementById("volatile-matter").value = selectedData.volati;
    document.getElementById("fix-carbon").value = selectedData.fixed_;
    document.getElementById("total-sulfur").value = selectedData.total_s;
    document.getElementById("gross-cv").value = selectedData.GCV_ad;
    document.getElementById("total-chlorine").value = selectedData.total_c;
    document.getElementById("carbon").value = selectedData.carbon;
    document.getElementById("hydrogen").value = selectedData.hydrog;
    document.getElementById("nitrogen").value = selectedData.nitrog;
    // document.getElementById("oxygen").value = selectedData.oxygen;
    document.getElementById("dt-reducing").value = selectedData.dt_red;
    document.getElementById("st-reducing").value = selectedData.st_red;
    document.getElementById("ht-reducing").value = selectedData.ht_red;
    document.getElementById("ft-reducing").value = selectedData.ft_red;
    document.getElementById("dt-oxidizing").value = selectedData.dt_oxi;
    document.getElementById("st-oxidizing").value = selectedData.st_oxi;
    document.getElementById("ht-oxidizing").value = selectedData.ht_oxi;
    document.getElementById("ft-oxidizing").value = selectedData.ft_oxi;
    document.getElementById("SiO2").value = selectedData.SiO2;
    document.getElementById("Al2O3").value = selectedData.Al2O;
    document.getElementById("Fe2O3").value = selectedData.Fe2O;
    document.getElementById("CaO").value = selectedData.CaO;
    document.getElementById("MgO").value = selectedData.MgO;
    document.getElementById("TiO2").value = selectedData.TiO2
    document.getElementById("Na2O").value = selectedData.Na2O;
    document.getElementById("K2O").value = selectedData.K2O;
    document.getElementById("Mn3O4").value = selectedData.Mn3O;
    document.getElementById("P2O5").value = selectedData.P2O5;
    document.getElementById("SO3").value = selectedData.SO3;

    closeModal();
} 