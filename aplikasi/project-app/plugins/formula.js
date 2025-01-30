
function calculateBaseAcidIndex() {
    const CaO = parseFloat(document.getElementById("CaO").value) || 0;
    const MgO = parseFloat(document.getElementById("MgO").value) || 0;
    const Na2O = parseFloat(document.getElementById("Na2O").value) || 0;
    const K2O = parseFloat(document.getElementById("K2O").value) || 0;
    const SiO2 = parseFloat(document.getElementById("SiO2").value) || 0;
    const Al2O3 = parseFloat(document.getElementById("Al2O3").value) || 0;
    const Fe2O3 = parseFloat(document.getElementById("Fe2O3").value) || 0;
    const TiO2 = parseFloat(document.getElementById("TiO2").value) || 0;
    
    const baseSum = Fe2O3 + CaO + MgO + Na2O + K2O;
    const acidSum = SiO2 + Al2O3 + TiO2;
    
    if (acidSum === 0) {
        document.getElementById("result").textContent = "Nilai asam tidak boleh nol.";
        return;
    }
    
    const baseAcidIndex = baseSum / acidSum; //formula base to acid ratio
    const silica_ratio = 100*SiO2/(SiO2+Fe2O3+CaO+MgO); //formula silica ratio

    document.getElementById("result_ba").textContent = `${baseAcidIndex.toFixed(2)}`;
    document.getElementById("result_si_ratio").textContent = `${silica_ratio.toFixed(2)}`;
}