import os
from flask import Flask, request, jsonify
from flask_cors import CORS
from model import Model
from datetime import datetime

app = Flask(__name__, static_url_path="/static")
CORS(app)

@app.route("/", methods=["GET"])
def home():
    return "HALLO BEBAN KELUARGA HAHAHAA"

@app.route("/endpoint", methods=["GET", "POST", "OPTIONS"])
def predict():
    forecast_periods = 0
    
    if request.method == "POST":
        model.reset(available=True)
        tanggal = datetime.strptime(request.json["tanggal"], "%Y-%m-%d")
        forecast_periods = model.date_input(tanggal)

        args = {
            "jumlah_hari": forecast_periods,
            "last_dataset": last_dataset,
            "scaler": scaler
        }
        result = model[args]

        return jsonify(result)
    
    # Menangani permintaan preflight (OPTIONS)
    if request.method == "OPTIONS":
        return _build_cors_preflight_response()
    
    return "HALLO BEBAN KELUARGA HAHAHAA"

def _build_cors_preflight_response():
    response = jsonify({})
    response.headers.add("Access-Control-Allow-Origin", "*")
    response.headers.add("Access-Control-Allow-Headers", "*")
    response.headers.add("Access-Control-Allow-Methods", "*")
    return response

if __name__ == "__main__":

    dataset_path="static/dataset/Brazilian Tobacco Leaf Price Reference.csv"
    model_path = "./static/model/lstm_model.h5"
    
    model = Model(model_path)
    dataset, scaler = model.load_dataset(dataset_path)
    last_dataset = dataset[:30]

    # Run Flask di localhost
    app.run(host="127.0.0.1", port=5001, debug=True)