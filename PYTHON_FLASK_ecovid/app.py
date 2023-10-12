from flask import Flask, json, jsonify, request
from flask_cors import CORS
from tensorflow import keras
from keras.models import Sequential, load_model
from keras.layers import Dense
from keras import callbacks
from joblib import load
from sklearn.model_selection import train_test_split
from sklearn.linear_model import LinearRegression
from sklearn.linear_model import BayesianRidge
from sklearn.pipeline import Pipeline
from sklearn.metrics import mean_absolute_percentage_error, mean_squared_error, r2_score
from joblib import dump
from joblib import load
from pathlib import Path
import numpy as np
import warnings
warnings.filterwarnings('ignore')
import os
import pandas as pd
import time


app = Flask(__name__)
CORS(app)
        

@app.route("/")
def hello_world():
    return "<p>Ini API Covid Jawa Tengah</p>"

    

@app.route("/regression/<string:predict>", methods=['POST'])
def regression(predict: str):
        body = request.json
        if predict == 'meninggal':
            testingX = [
                # body['minggu'],
                # body['ppkm'],
                body['kabupaten'],
                body['sembuh'],
                body['positif']
            ]
            pipelineregmeninggal = load("regressionmodelmeninggal.joblib")
            prediksi = pipelineregmeninggal.predict([testingX])
            return jsonify(prediksi[0])
        elif predict == 'sembuh':
            testingX = [
                # body['minggu'],
                # body['ppkm'],
                body['kabupaten'],
                body['meninggal'],
                body['positif']
            ]
            pipelineregsembuh = load("regressionmodelsembuh.joblib")
            prediksi = pipelineregsembuh.predict([testingX])
            return jsonify(prediksi[0])
        elif predict == 'positif':
            testingX = [
                # body['minggu'],
                # body['ppkm'],
                body['kabupaten'],
                body['sembuh'],
                body['meninggal']
            ]
            pipelineregpositif = load("regressionmodelpositif.joblib")
            prediksi = pipelineregpositif.predict([testingX])
            return jsonify(prediksi[0])
        else:     
         return 'Prediksi Salah, Silahkan Coba Lagi'
        
@app.route("/bayesian/<string:predict>", methods=['POST'])
def bayesian(predict: str):
        body = request.json
        if predict == 'meninggal':
            testingX = [
                # body['minggu'],
                # body['ppkm'],
                body['kabupaten'],
                body['sembuh'],
                body['positif']
            ]
            pipelinebaymeninggal = load("bayessianmodelmeninggal.joblib")
            prediksi = pipelinebaymeninggal.predict([testingX])
            return jsonify(prediksi[0])
        elif predict == 'sembuh':
            testingX = [
                # body['minggu'],
                # body['ppkm'],
                body['kabupaten'],
                body['meninggal'],
                body['positif']
            ]
            pipelinebaysembuh = load("bayessianmodelsembuh.joblib")
            prediksi = pipelinebaysembuh.predict([testingX])
            return jsonify(prediksi[0])
        elif predict == 'positif':
            testingX = [
                # body['minggu'],
                # body['ppkm'],
                body['kabupaten'],
                body['sembuh'],
                body['meninggal']
            ]
            pipelinebaypositif = load("bayessianmodelpositif.joblib")
            prediksi = pipelinebaypositif.predict([testingX])
            return jsonify(prediksi[0])
        else:     
         return 'Prediksi Salah, Silahkan Coba Lagi' 

@app.route("/ann/<string:predict>", methods=['POST'])
# def test(predict: str):
#     return predict
def ann(predict: str):
        body = request.json
        if predict == 'meninggal':
            testingX = [
                # body['minggu'],
                # body['ppkm'],
                body['kabupaten'],
                body['sembuh'],
                body['positif']
            ]
            pipelineannmeninggal = load_model('./annmodelmeninggal.h5')
            pipelineannmeninggal.compile(optimizer='adam',
            loss='mean_absolute_error',
            metrics=['accuracy'])
            # pipelineannmeninggal = load("annmodelmeninggal.joblib")
            prediksi = pipelineannmeninggal.predict(np.array([testingX]).tolist()).tolist()
            return jsonify(prediksi[0])
        elif predict == 'sembuh':
            testingX = [
                # body['minggu'],
                # body['ppkm'],
                body['kabupaten'],
                body['meninggal'],
                body['positif']
            ]
            # pipelineannsembuh = load("annmodelsembuh.joblib")
            pipelineannsembuh = load_model('./annmodelsembuh.h5')
            pipelineannsembuh.compile(optimizer='adam',
            loss='mean_absolute_error',
            metrics=['accuracy'])
            prediksi = pipelineannsembuh.predict(np.array([testingX]).tolist()).tolist()
            return jsonify(prediksi[0])
        elif predict == 'positif':
            testingX = [
                # body['minggu'],
                # body['ppkm'],
                body['kabupaten'],
                body['sembuh'],
                body['meninggal']
            ]
            # pipelineannpositif = load("annmodelpositif.joblib")
            pipelineannpositif = load_model('./annmodelpositif.h5')
            pipelineannpositif.compile(optimizer='adam',
            loss='mean_absolute_error',
            metrics=['accuracy'])
            prediksi = pipelineannpositif.predict(np.array([testingX]).tolist()).tolist()
            return jsonify(prediksi[0])
        else:     
         return 'Prediksi Salah, Silahkan Coba Lagi'          

@app.route("/performance", methods=['POST'])
def getPerformance():
    start_time = time.time()

    body = request.json
    # df = pd.read_csv('outputdummy.csv')
    df =  pd.json_normalize(
        body,meta=[
            'id_kabupaten',
            # 'minggudalamtahun',
            'sembuh',
            'positif',
            'meninggal']
    )
    df = df.rename(columns={
        'id_kabupaten':'kabupaten',
        # 'minggudalamtahun':'minggu',
        'sembuh':'sembuh',
        'positif':'total_kasus',
        'meninggal':'meninggal'
    }
    )
    df['kabupaten'] = df['kabupaten'].astype(str).astype(int)
    # df['minggu'] = df['minggu'].astype(str).astype(int)
    df['sembuh'] = df['sembuh'].astype(str).astype(int)
    df['total_kasus'] = df['total_kasus'].astype(str).astype(int)
    df['meninggal'] = df['meninggal'].astype(str).astype(int)   
    # df['PPKM'] = 0
    def makeFeaturesFrame(feature):
        df_3 = df.copy()
        df3 = df_3[['kabupaten','sembuh','meninggal','total_kasus']]
        # df3 = df_3[['minggu','PPKM','kabupaten','sembuh','meninggal','total_kasus']]
        xFrame = df3.drop(feature,axis=1)
        yFrame = df3[feature]
        return xFrame,yFrame

    def SIR_makeFeaturesFrame(feature):
        df_3 = df.copy()
        n_population = int("819,785".replace(",", ""))
        df_filter = df_3[['kabupaten','sembuh','meninggal','total_kasus']]
        # df_filter = df_3[['minggu','PPKM','kabupaten','sembuh','meninggal','total_kasus']]
        # df_filter["T"] = df_filter.loc[:, "minggu"]
        df_filter["S"] = n_population - df_filter.loc[:, "total_kasus"] - df_filter.loc[:, "meninggal"] - df_filter.loc[:, "sembuh"]
        df_filter["I"] = df_filter.loc[:, "total_kasus"]
        df_filter["R"] = df_filter.loc[:, "meninggal"] + df_filter.loc[:, "sembuh"]
        df_filter[["x", "y", "z"]] = df_filter[["S", "I", "R"]] / n_population
        # df3 = df_filter[['minggu','PPKM','kabupaten','sembuh','meninggal','total_kasus']]
        df3 = df_filter[['kabupaten','sembuh','meninggal','total_kasus']]
        xFrame = df3.drop(feature,axis=1)
        yFrame = df3[feature]
        return xFrame,yFrame

    def makeRegressionPredict(xFrame,yFrame):
        X_train, X_test, y_train, y_test = train_test_split(xFrame.values,yFrame.values,test_size=0.20,shuffle=False)
        model = LinearRegression()
        model.fit(X_train, y_train)
        predict = model.predict(X_test)
        mse = mean_squared_error(y_test,predict)
        rmse = np.sqrt(mse)
        mse = format(mse, '.6f')
        rmse = format(rmse, '.6f')
        r2 = r2_score(y_test,predict)
        score = model.score(X_test,y_test)
        return mse,rmse,r2

    def makeBayesianPredict(xFrame,yFrame):
        X_train, X_test, y_train, y_test = train_test_split(xFrame.values,yFrame.values,test_size=0.20,shuffle=False)
        model = BayesianRidge()
        model.fit(X_train, y_train)
        predict = model.predict(X_test)
        mse = mean_squared_error(y_test,predict)
        rmse = np.sqrt(mse)
        mse = format(mse, '.6f')
        rmse = format(rmse, '.6f')
        r2 = r2_score(y_test,predict)
        return mse,rmse,r2
    # get
    meninggal_index = makeFeaturesFrame('meninggal')
    sembuh_index = makeFeaturesFrame('sembuh')
    total_kasus_index = makeFeaturesFrame('total_kasus')
    SIRmeninggal_index = SIR_makeFeaturesFrame('meninggal')
    SIRsembuh_index = SIR_makeFeaturesFrame('sembuh')
    SIRtotal_kasus_index = SIR_makeFeaturesFrame('total_kasus')
    # perform
    meninggal_predict = makeRegressionPredict(meninggal_index[0],meninggal_index[1])
    sembuh_predict = makeRegressionPredict(sembuh_index[0],sembuh_index[1])
    total_kasus_predict = makeRegressionPredict(total_kasus_index[0],total_kasus_index[1])
    SIRmeninggal_predict = makeBayesianPredict(SIRmeninggal_index[0],SIRmeninggal_index[1])
    SIRsembuh_predict = makeBayesianPredict(SIRsembuh_index[0],SIRsembuh_index[1])
    SIRtotal_kasus_predict = makeBayesianPredict(SIRtotal_kasus_index[0],SIRtotal_kasus_index[1])
    return jsonify([meninggal_predict,sembuh_predict,total_kasus_predict,SIRmeninggal_predict,SIRsembuh_predict,SIRtotal_kasus_predict])

@app.route("/retrain", methods=['POST'])
def retrain():
    start_time = time.time()

    body = request.json
    # df = pd.read_csv('outputdummy.csv')
    df =  pd.json_normalize(
        body,meta=[
            'id_kabupaten',
            # 'minggudalamtahun',
            'sembuh',
            'positif',
            'meninggal']
    )
    df = df.rename(columns={
        'id_kabupaten':'kabupaten',
        # 'minggudalamtahun':'minggu',
        'sembuh':'sembuh',
        'positif':'total_kasus',
        'meninggal':'meninggal'
    }
    )
    df['kabupaten'] = df['kabupaten'].astype(str).astype(int)
    # df['minggu'] = df['minggu'].astype(str).astype(int)
    df['sembuh'] = df['sembuh'].astype(str).astype(int)
    df['total_kasus'] = df['total_kasus'].astype(str).astype(int)
    df['meninggal'] = df['meninggal'].astype(str).astype(int)   
    # df['PPKM'] = 0
    def makeFeaturesFrame(feature):
        df_3 = df.copy()
        df3 = df_3[['kabupaten','sembuh','meninggal','total_kasus']]
        # df3 = df_3[['minggu','PPKM','kabupaten','sembuh','meninggal','total_kasus']]
        xFrame = df3.drop(feature,axis=1)
        yFrame = df3[feature]
        return xFrame,yFrame

    def SIR_makeFeaturesFrame(feature):
        df_3 = df.copy()
        n_population = int("819,785".replace(",", ""))
        df_filter = df_3[['kabupaten','sembuh','meninggal','total_kasus']]
        # df_filter = df_3[['minggu','PPKM','kabupaten','sembuh','meninggal','total_kasus']]
        # df_filter["T"] = df_filter.loc[:, "minggu"]
        df_filter["S"] = n_population - df_filter.loc[:, "total_kasus"] - df_filter.loc[:, "meninggal"] - df_filter.loc[:, "sembuh"]
        df_filter["I"] = df_filter.loc[:, "total_kasus"]
        df_filter["R"] = df_filter.loc[:, "meninggal"] + df_filter.loc[:, "sembuh"]
        df_filter[["x", "y", "z"]] = df_filter[["S", "I", "R"]] / n_population
        # df3 = df_filter[['minggu','PPKM','kabupaten','sembuh','meninggal','total_kasus']]
        df3 = df_filter[['kabupaten','sembuh','meninggal','total_kasus']]
        xFrame = df3.drop(feature,axis=1)
        yFrame = df3[feature]
        return xFrame,yFrame

    #######-----REGRESSION MENINGGAL-----#########

    # Create dataframe
    meninggal_index = makeFeaturesFrame('meninggal')

    # Train the data
    X_train, X_test, y_train, y_test = train_test_split(meninggal_index[0].values,meninggal_index[1].values,test_size=0.20,shuffle=False)
    model = LinearRegression()
    regressionmodel = Pipeline([('regression',model)])
    regressionmodel.fit(X_train, y_train)

    # Delete last joblib
    if os.path.isfile("regressionmodelmeninggal.joblib"):
        print("Joblib Meninggal ada")
        os.remove("regressionmodelmeninggal.joblib")
    else:
        print("Joblib Meninggal tidak ada")

    # Dump it
    dump(regressionmodel, filename="regressionmodelmeninggal.joblib")

    #######-----REGRESSION POSITIF-----#########

    # Create dataframe
    positif_index = makeFeaturesFrame('total_kasus')

    # Train the data
    X_train, X_test, y_train, y_test = train_test_split(positif_index[0].values,positif_index[1].values,test_size=0.20,shuffle=False)
    model = LinearRegression()
    regressionmodel = Pipeline([('regression',model)])
    regressionmodel.fit(X_train, y_train)

    # Delete last joblib
    if os.path.isfile("regressionmodelpositif.joblib"):
        print("Joblib Positif ada")
        os.remove("regressionmodelpositif.joblib")
    else:
        print("Joblib Positif tidak ada")

    # Dump it
    dump(regressionmodel, filename="regressionmodelpositif.joblib")

    #######-----REGRESSION SEMBUH-----#########

    # Create dataframe
    sembuh_index = makeFeaturesFrame('sembuh')

    # Train the data
    X_train, X_test, y_train, y_test = train_test_split(sembuh_index[0].values,sembuh_index[1].values,test_size=0.20,shuffle=False)
    model = LinearRegression()
    regressionmodel = Pipeline([('regression',model)])
    regressionmodel.fit(X_train, y_train)

    # Delete last joblib
    if os.path.isfile("regressionmodelsembuh.joblib"):
        print("Joblib sembuh ada")
        os.remove("regressionmodelsembuh.joblib")
    else:
        print("Joblib sembuh tidak ada")

    # Dump it
    dump(regressionmodel, filename="regressionmodelsembuh.joblib")




    #######-----BAYESSIAN MENINGGAL-----#########

    # Create dataframe
    meninggal_index_sir = SIR_makeFeaturesFrame('meninggal')

    # Train the data
    X_train, X_test, y_train, y_test = train_test_split(meninggal_index_sir[0].values,meninggal_index_sir[1].values,test_size=0.20,shuffle=False)
    model = BayesianRidge()
    bayessianmodel = Pipeline([('bayessian',model)])
    bayessianmodel.fit(X_train, y_train)

    # Delete last joblib
    if os.path.isfile("bayessianmodelmeninggal.joblib"):
        print("Joblib bayessian Meninggal ada")
        os.remove("bayessianmodelmeninggal.joblib")
    else:
        print("Joblib bayessian Meninggal tidak ada")

    # Dump it
    dump(bayessianmodel, filename="bayessianmodelmeninggal.joblib")


    #######-----BAYESSIAN POSITIF-----#########

    # Create dataframe
    positif_index_sir = SIR_makeFeaturesFrame('total_kasus')

    # Train the data
    X_train, X_test, y_train, y_test = train_test_split(positif_index_sir[0].values,positif_index_sir[1].values,test_size=0.20,shuffle=False)
    model = BayesianRidge()
    bayessianmodel = Pipeline([('bayessian',model)])
    bayessianmodel.fit(X_train, y_train)

    # Delete last joblib
    if os.path.isfile("bayessianmodelpositif.joblib"):
        print("Joblib bayessian positif ada")
        os.remove("bayessianmodelpositif.joblib")
    else:
        print("Joblib bayessian positif tidak ada")

    # Dump it
    dump(bayessianmodel, filename="bayessianmodelpositif.joblib")

    #######-----BAYESSIAN SEMBUH-----#########

    # Create dataframe
    sembuh_index_sir = SIR_makeFeaturesFrame('sembuh')

    # Train the data
    X_train, X_test, y_train, y_test = train_test_split(sembuh_index_sir[0].values,sembuh_index_sir[1].values,test_size=0.20,shuffle=False)
    model = BayesianRidge()
    bayessianmodel = Pipeline([('bayessian',model)])
    bayessianmodel.fit(X_train, y_train)

    # Delete last joblib
    if os.path.isfile("bayessianmodelsembuh.joblib"):
        print("Joblib bayessian sembuh ada")
        os.remove("bayessianmodelsembuh.joblib")
    else:
        print("Joblib bayessian sembuh tidak ada")

    # Dump it
    dump(bayessianmodel, filename="bayessianmodelsembuh.joblib")




    #######-----ANN MENINGGAL-----#########

    # Create dataframe
    meninggal_index = makeFeaturesFrame('meninggal')

    # Train the data
    X_train, X_test, y_train, y_test = train_test_split(meninggal_index[0].values,meninggal_index[1].values,test_size=0.05,shuffle=False)
    annmodelmeninggal = Sequential([
        # Dense(2, activation='relu', input_shape=(2,)),
        Dense(5, activation='relu', input_shape=(3,)),
        Dense(9, activation='relu'),
        Dense(1,),
    ])
    annmodelmeninggal.compile(optimizer='adam',
                loss='mean_absolute_error',
                metrics=['accuracy'])
    
    earlystopping = callbacks.EarlyStopping(monitor="val_loss",
                                        mode="min", patience=5,
                                        restore_best_weights=True)
 
    annmodelmeninggal.fit(X_train,y_train,validation_data=(X_test, y_test),batch_size=5, epochs=300,callbacks=[earlystopping])

    # Delete last joblib
    if os.path.isfile("annmodelmeninggal.h5"):
        print("Joblib ANN Meninggal ada")
        os.remove("annmodelmeninggal.h5")
    else:
        print("Joblib ANN Meninggal tidak ada")

    # Dump it
    annmodelmeninggal.save("annmodelmeninggal.h5")

    #######-----ANN POSITIF-----#########

    # Create dataframe
    positif_index = makeFeaturesFrame('total_kasus')

    # Train the data
    X_train, X_test, y_train, y_test = train_test_split(positif_index[0].values,positif_index[1].values,test_size=0.05,shuffle=False)
    annmodelpositif = Sequential([
        # Dense(2, activation='relu', input_shape=(2,)),
        Dense(5, activation='relu', input_shape=(3,)),
        Dense(9, activation='relu'),
        Dense(1,),
    ])
    annmodelpositif.compile(optimizer='adam',
                loss='mean_absolute_error',
                metrics=['accuracy'])
    
    earlystopping = callbacks.EarlyStopping(monitor="val_loss",
                                        mode="min", patience=5,
                                        restore_best_weights=True)
    
    annmodelpositif.fit(X_train,y_train,validation_data=(X_test, y_test),batch_size=5, epochs=300,callbacks=[earlystopping])

    # Delete last joblib
    if os.path.isfile("annmodelpositif.h5"):
        print("Joblib ANN positif ada")
        os.remove("annmodelpositif.h5")
    else:
        print("Joblib ANN positif tidak ada")

    # Dump it
    annmodelpositif.save("annmodelpositif.h5")

    #######-----ANN SEMBUH-----#########

    # Create dataframe
    sembuh_index = makeFeaturesFrame('sembuh')

    # Train the data
    X_train, X_test, y_train, y_test = train_test_split(sembuh_index[0].values,sembuh_index[1].values,test_size=0.05,shuffle=False)
    annmodelsembuh = Sequential([
        # Dense(2, activation='relu', input_shape=(2,)),
        Dense(5, activation='relu', input_shape=(3,)),
        Dense(9, activation='relu'),
        Dense(1,),
    ])
    annmodelsembuh.compile(optimizer='adam',
                loss='mean_absolute_error',
                metrics=['accuracy'])
    
    earlystopping = callbacks.EarlyStopping(monitor="val_loss",
                                        mode="min", patience=5,
                                        restore_best_weights=True)
    
    annmodelsembuh.fit(X_train,y_train,validation_data=(X_test, y_test),batch_size=5, epochs=300,callbacks=[earlystopping])

    # Delete last joblib
    if os.path.isfile("annmodelsembuh.h5"):
        print("Joblib ANN sembuh ada")
        os.remove("annmodelsembuh.h5")
    else:
        print("Joblib ANN sembuh tidak ada")

    # Dump it
    annmodelsembuh.save("annmodelsembuh.h5")

    print("--- %s seconds ---" % (time.time() - start_time))
    return "Berhasil"

@app.route("/test", methods=['POST'])
def test():
    body = request.json
    # testingX = [
    #     body['minggudalamtahun'],
    #     body['id_kabupaten'],
    #     body['sembuh'],
    #     body['positif'],
    #     body['meninggal']
    # ]
    df =  pd.json_normalize(
        body,meta=['id_kabupaten','minggudalamtahun','sembuh','positif','meninggal']
    )
    df['id_kabupaten'] = df['id_kabupaten'].astype(str).astype(int)
    df['PPKM'] = 1
    return print(df.dtypes)
    


if __name__ =='__main__':
    app.run()