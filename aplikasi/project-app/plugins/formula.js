
function calculateBaseAcidIndex() {
    //Inisiasi Variable/Konstanta
    const t_moist = parseFloat(document.getElementById("t-moist").value) || 0;
    const ash_content = parseFloat(document.getElementById("ash-content").value) || 0;
    const volatile_matter = parseFloat(document.getElementById("volatile-matter").value) || 0;
    const fixed_carbon= parseFloat(document.getElementById("fix-carbon").value) || 0;
    const gcv_adb= parseFloat(document.getElementById("gross-cv").value) || 0;
    const total_chlorine = parseFloat(document.getElementById("total-chlorine").value) || 0;
    const total_sulfur = parseFloat(document.getElementById("total-sulfur").value) || 0;
    const i_moist = parseFloat(document.getElementById("i-moist").value) || 0;

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
    
    // Formula
    const baseSum = Fe2O3 + CaO + MgO + Na2O + K2O;
    const acidSum = SiO2 + Al2O3 + TiO2;
    
    if (acidSum === 0) {
        document.getElementById("result").textContent = "Nilai asam tidak boleh nol.";
        return;
    }
    
    

    const baseAcidIndex = baseSum / acidSum; //formula base to acid ratio
    const silica_ratio = 100*SiO2/(SiO2+Fe2O3+CaO+MgO); //formula silica ratio
    const slagging_index = baseAcidIndex*total_sulfur*100/(100-i_moist); //formula slagging index

    if (baseAcidIndex < 0.5){
        document.getElementById("ba-tab").style.backgroundColor ='#cdff68';

    }
    else if(baseAcidIndex > 0.7){
        document.getElementById("ba-tab").style.backgroundColor ='#ff7c7c';

    }
    else {
        document.getElementById("ba-tab").style.backgroundColor ='#fffd61';

    }
    document.getElementById("oxygen").value = oxygen.toFixed(2);
    document.getElementById("result_ba").textContent = `${baseAcidIndex.toFixed(2)}`;
    document.getElementById("result_si_ratio").textContent = `${silica_ratio.toFixed(2)}`;
    document.getElementById("result_slagging_index").textContent = `${slagging_index.toFixed(2)}`;


}