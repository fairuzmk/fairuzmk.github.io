async function getExchangeRate(pair) {
    const apiKey = '75a382a052b18b4d734596a5'; // Ganti dengan API key Anda
    const baseCurrency = pair.substring(0, 3); // Ambil 3 karakter pertama (mata uang dasar)
    const targetCurrency = pair.substring(3, 6); // Ambil 3 karakter berikutnya (mata uang tujuan)

    try {
        console.log(`Fetching exchange rate for: ${baseCurrency} to ${targetCurrency}`); // Debugging
        const response = await fetch(`https://v6.exchangerate-api.com/v6/${apiKey}/latest/${baseCurrency}`);
        const data = await response.json();
        
        if (data.result === "success") {
            console.log(`Exchange Rate Retrieved: 1 ${baseCurrency} = ${data.conversion_rates[targetCurrency]} ${targetCurrency}`);
            return data.conversion_rates[targetCurrency];
        } else {
            console.error("Failed to fetch exchange rate:", data);
            return null;
        }
    } catch (error) {
        console.error("Error fetching exchange rate:", error);
        return null;
    }
}

async function getPipValue(pair, exchangeRate) {
    let pipValue;
    const quoteCurrency = pair.substring(3, 6); // Mata uang kedua (misal GBP dari EUR/GBP)

    if (pair.endsWith("JPY")) {
        pipValue = 1000 / exchangeRate; // Untuk JPY pairs (USD/JPY, EUR/JPY, dll.)
    } else if (pair.includes("USD")) {
        if (pair.startsWith("USD")) {
            pipValue = 100 / exchangeRate; // Contoh: USD/JPY
        } else {
            pipValue = 10; // Contoh: EUR/USD
        }
    } else {
        // 🔥 Menangani Cross Pair (misalnya EUR/GBP)
        let quoteToUsdRate = await getExchangeRate(quoteCurrency + "USD");

        if (!quoteToUsdRate) {
            // Jika GBPUSD tidak ada, coba ambil USDGBP dan hitung kebalikannya
            let usdToQuoteRate = await getExchangeRate("USD" + quoteCurrency);
            if (usdToQuoteRate) {
                quoteToUsdRate = 1 / usdToQuoteRate; // Konversi USDGBP → GBPUSD
            } else {
                console.error("Gagal mengambil nilai tukar untuk", quoteCurrency + "USD atau USD" + quoteCurrency);
                return null;
            }
        }

        pipValue = 10 * quoteToUsdRate; // Konversi pip value ke USD
    }

    console.log(`Final Pip Value for ${pair}: ${pipValue}`);
    return pipValue;
}

async function calculatePositionSize() {
    // Ambil nilai input
    const accountBalance = parseFloat(document.getElementById('accountBalance').value);
    const riskPercentage = parseFloat(document.getElementById('riskPercentage').value);
    const stopLossPips = parseFloat(document.getElementById('stopLossPips').value);
    const pair = document.getElementById('pair').value.trim(); // Pastikan tidak ada spasi ekstra

    // Validasi input
    if (isNaN(accountBalance) || isNaN(riskPercentage) || isNaN(stopLossPips) || !pair) {
        alert("Please fill in all fields with valid numbers.");
        return;
    }

    console.log("Selected Pair:", pair); // Debugging untuk cek apakah pair benar

    // Hitung risiko dalam USD
    const riskAmount = (accountBalance * riskPercentage) / 100;
    console.log(`Risk Amount (USD): ${riskAmount.toFixed(2)}`); // Debugging

    // Ambil nilai tukar
    const exchangeRate = await getExchangeRate(pair);
    if (!exchangeRate) {
        alert("Failed to fetch exchange rate. Please try again.");
        return;
    }

    // Hitung pip value berdasarkan pasangan mata uang
    const pipValue = await getPipValue(pair, exchangeRate);

    // Validasi apakah pipValue berhasil dihitung
    if (!pipValue) {
        alert("Failed to calculate pip value. Please try again.");
        return;
    }

    // Hitung ukuran posisi (dalam lot)
    const positionSize = (riskAmount / (stopLossPips * pipValue)).toFixed(5);
    const stopLossAmount = (riskAmount).toFixed(2);
    const realSize = (positionSize * 100000).toFixed(2);

    // Tampilkan hasil
    document.getElementById('positionSizeResult').textContent = positionSize;
    document.getElementById('stopLossAmount').textContent = stopLossAmount;
    document.getElementById('realSize').textContent = realSize;

    // Debugging hasil akhir
    console.log(`Pair: ${pair}, Exchange Rate: ${exchangeRate}, Pip Value: ${pipValue}, Position Size: ${positionSize}`);
}
