document.addEventListener("DOMContentLoaded", function () {
    const inputValue = document.getElementById("inputValue");
    const outputValue = document.getElementById("outputValue");
    const fromUnit = document.getElementById("fromUnit");
    const toUnit = document.getElementById("toUnit");
    const formulaText = document.getElementById("formulaText");
    const kategori = document.getElementById("kategori");

    const conversionData = {
        panjang: {
            units: { Meter: 1, Kilometer: 0.001, Centimeter: 100, Mil: 0.000621371, Kaki: 3.28084, Inch: 39.3701 },
            formula: "Gunakan faktor konversi yang sesuai."
        },
        suhu: {
            formula: {
                celsius_fahrenheit: (x) => (x * 9/5) + 32,
                fahrenheit_celsius: (x) => (x - 32) * 5/9,
                celsius_kelvin: (x) => x + 273.15,
                kelvin_celsius: (x) => x - 273.15,
                fahrenheit_kelvin: (x) => (x - 32) * 5/9 + 273.15,
                kelvin_fahrenheit: (x) => (x - 273.15) * 9/5 + 32
            }
        },
        berat: { units: { gram: 1, kilogram: 0.001, pon: 0.00220462, ons: 0.035274 } },
        waktu: { units: { detik: 1, menit: 1/60, jam: 1/3600, hari: 1/86400 } },
        volume: { units: { liter: 1, mililiter: 1000, galon: 0.264172 } },
        energi: { units: { MJ: 1, joule: 1000000, kkal: 239.006, kalori: 239006, kilowatt_hour: 0.277777778 } },
        kecepatan: { units: { meter_per_detik: 1, kilometer_per_jam: 3.6, mil_per_jam: 2.23694 } },
        tekanan: {
        units: { pascal: 1, bar: 1e-5, atm: 9.86923e-6, psi: 0.000145038, torr: 0.00750062 },
        formula: "Gunakan faktor konversi yang sesuai."
        }
    };

    function updateUnits() {
        let selectedCategory = kategori.value;
        fromUnit.innerHTML = "";
        toUnit.innerHTML = "";

        if (selectedCategory === "suhu") {
            ["celsius", "fahrenheit", "kelvin"].forEach(unit => {
                fromUnit.add(new Option(unit, unit));
                toUnit.add(new Option(unit, unit));
            });
        } else {
            Object.keys(conversionData[selectedCategory].units).forEach(unit => {
                fromUnit.add(new Option(unit, unit));
                toUnit.add(new Option(unit, unit));
            });
        }

        fromUnit.selectedIndex = 0;
        toUnit.selectedIndex = 1;
        convert();
    }

    function convert() {
        let value = parseFloat(inputValue.value);
        let from = fromUnit.value;
        let to = toUnit.value;
        let selectedCategory = kategori.value;
        let result = value;
        let formula = "";

        if (selectedCategory === "suhu") {
            result = conversionData.suhu.formula[`${from}_${to}`](value);
            formula = `Gunakan rumus konversi suhu`;
        } else {
            let units = conversionData[selectedCategory].units;
            result = (value * units[to]) / units[from];
            formula = `Kalikan dengan ${units[to] / units[from]}`;
        }

        outputValue.value = result.toFixed(2);
        formulaText.textContent = formula;
    }

    inputValue.addEventListener("input", convert);
    fromUnit.addEventListener("change", convert);
    toUnit.addEventListener("change", convert);
    kategori.addEventListener("change", updateUnits);

    updateUnits();
});