const express = require("express");
const bodyParser = require("body-parser");
const QRCode = require("qrcode");
const cors = require("cors");

const app = express();
const PORT = 5000; // or any port you like

app.use(cors());
app.use(bodyParser.json());

app.post("/generate-qr", async (req, res) => {
    const { upiId, name, amount } = req.body;

    if (!upiId) return res.status(400).json({ error: "upiId is required" });

    const params = new URLSearchParams({
        pa: upiId,
        pn: name || "Merchant",
        cu: "INR",
    });

    if (amount) params.set("am", amount);

    const upiUrl = `upi://pay?${params.toString()}`;

    console.log(upiId);
    try {
        const qrBase64 = await QRCode.toDataURL(upiUrl, { width: 300 });
        res.json({
            base64: qrBase64.split(",")[1], // Remove data:image/png;base64,
            upi_url: upiUrl,
        });
    } catch (err) {
        res.status(500).json({ error: err.message });
    }
});

app.listen(PORT, () => console.log(`QR service running on port ${PORT}`));
