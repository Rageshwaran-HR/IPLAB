// app.js
const express = require("express");
const bodyParser = require("body-parser");
const cors = require("cors");

const app = express();
const PORT = 3000;

// Middleware
app.use(cors());
app.use(bodyParser.json());

let opinions = []; // Array to store opinions

// Endpoint to submit an opinion
app.post("/submit-opinion", (req, res) => {
  const { product, opinion } = req.body;

  // Simple validation
  if (!product || !opinion) {
    return res
      .status(400)
      .json({ message: "Product and opinion are required." });
  }

  // Store the opinion
  opinions.push({ product, opinion });

  // Check if we have reached 500 opinions
  if (opinions.length >= 500) {
    return res
      .status(200)
      .json({
        message: "Thank you for your opinion! We have collected 500 responses.",
      });
  }

  res
    .status(200)
    .json({
      message: "Opinion submitted successfully!",
      totalOpinions: opinions.length,
    });
});

// Endpoint to get all opinions
app.get("/opinions", (req, res) => {
  res.status(200).json(opinions);
});

// Start the server
app.listen(PORT, () => {
  console.log(`Server is running on http://localhost:${PORT}`);
});
