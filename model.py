import numpy as np
import pandas as pd
from sklearn.preprocessing import MinMaxScaler
from tensorflow.keras.models import load_model
from datetime import datetime, timedelta

class Model:
    def __init__(self, path_model):
        self.model = load_model(path_model)
        self.last_date = datetime(2024, 1, 1)
        self.kurs_usd = 15000
        self.predicted_prices = []
        self.response = {
            "data": []
        }

    def reset(self, available=True):
        if available:
            self.response = {
                "data":[]
            }
            self.predicted_prices = []
        
        return True
        
    def load_dataset(self, path):
        data = pd.read_csv(path)
        dataframe = data.iloc[:660]

        dataframe.insert(0, "tanggal", dataframe.index)
        dataframe["tanggal"].apply(self.konversi_tanggal)
        
        df = dataframe.drop(columns=["Company", "Tobacco_Type", "Class"])
        df = df.rename(columns={"R$_Kg": "harga"})
        
        dataset, scaler = self.preprocess_data(df)
        return (dataset, scaler)
    
    def konversi_tanggal(self, hari, predict=False):
        if predict:
            tanggal_hasil = self.last_date + timedelta(days=hari)
        else:
            tanggal_hasil = self.last_date - timedelta(days=hari)
        return tanggal_hasil
        
    def konversi_kurs(self, data):
        return int(data*self.kurs_usd)
    
    def preprocess_data(self, df):
        dataset = df['harga'].values.reshape(-1, 1)
        scaler = MinMaxScaler(feature_range=(0, 1))
        dataset = scaler.fit_transform(dataset)
        return dataset, scaler
    
    def predicted(self, jumlah_hari, last_dataset):
        X_input = np.reshape(last_dataset, (1, 30, 1))
        
        for _ in range(jumlah_hari):
            next_day_prediction = self.model.predict(X_input)
            
            self.predicted_prices.append(next_day_prediction)
            
            X_input = np.append(X_input[:,1:,:], next_day_prediction.reshape(1,1,1), axis=1)

        return self.predicted_prices
    
    def date_input(self, date):
        input_date = pd.to_datetime(date)
        forecast_periods = (input_date - self.last_date).days
        return forecast_periods
            
    def __getitem__(self, argument):
        prediction = self.predicted(argument["jumlah_hari"], argument["last_dataset"])
        
        inverse_predict = argument["scaler"].inverse_transform(np.array(prediction).reshape(-1, 1))
        
        for i in range(len(inverse_predict)):
            tanggal = self.konversi_tanggal(i+1, predict=True)
            
            self.response["data"].append({
                "date": tanggal, 
                "price": f"{inverse_predict[i][0]:.2f}"
            })
            
        last_data = self.response["data"][-1]
        self.response["max_date"] = last_data["date"]
        
        return self.response