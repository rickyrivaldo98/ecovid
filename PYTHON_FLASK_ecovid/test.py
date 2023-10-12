from flask import Flask, json, jsonify, request
from flask_cors import CORS
from tensorflow import keras
from keras.models import Sequential, load_model
from keras.layers import Dense
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
start_time = time.time()

df = pd.read_csv('outputdummy.csv')

def makeFeaturesFrame(feature):
    df_3 = df.copy()
    # df3 = df_3[['sembuh','meninggal','total_kasus']]
    df3 = df_3[['minggu','PPKM','kabupaten','sembuh','meninggal','total_kasus']]
    xFrame = df3.drop(feature,axis=1)
    yFrame = df3[feature]
    return xFrame,yFrame

def SIR_makeFeaturesFrame(feature):
  df_3 = df.copy()
  n_population = int("819,785".replace(",", ""))
  df_filter = df_3[['minggu','PPKM','kabupaten','sembuh','meninggal','total_kasus']]
  df_filter["T"] = df_filter.loc[:, "minggu"]
  df_filter["S"] = n_population - df_filter.loc[:, "total_kasus"] - df_filter.loc[:, "meninggal"] - df_filter.loc[:, "sembuh"]
  df_filter["I"] = df_filter.loc[:, "total_kasus"]
  df_filter["R"] = df_filter.loc[:, "meninggal"] + df_filter.loc[:, "sembuh"]
  df_filter[["x", "y", "z"]] = df_filter[["S", "I", "R"]] / n_population
  df3 = df_filter[['minggu','PPKM','kabupaten','sembuh','meninggal','total_kasus']]
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




# #######-----ANN MENINGGAL-----#########

# # Create dataframe
# meninggal_index = makeFeaturesFrame('meninggal')

# # Train the data
# X_train, X_test, y_train, y_test = train_test_split(meninggal_index[0].values,meninggal_index[1].values,test_size=0.05,shuffle=False)
# annmodelmeninggal = Sequential([
#     # Dense(2, activation='relu', input_shape=(2,)),
#     Dense(5, activation='relu', input_shape=(5,)),
#     Dense(9, activation='relu'),
#     Dense(1,),
# ])
# annmodelmeninggal.compile(optimizer='adam',
#             loss='mean_absolute_error',
#             metrics=['accuracy'])
# annmodelmeninggal.fit(X_train,y_train,validation_data=(X_test, y_test),batch_size=5, epochs=300)

# # Delete last joblib
# if os.path.isfile("annmodelmeninggal.h5"):
#     print("Joblib ANN Meninggal ada")
#     os.remove("annmodelmeninggal.h5")
# else:
#     print("Joblib ANN Meninggal tidak ada")

# # Dump it
# annmodelmeninggal.save("annmodelmeninggal.h5")

# #######-----ANN POSITIF-----#########

# # Create dataframe
# positif_index = makeFeaturesFrame('total_kasus')

# # Train the data
# X_train, X_test, y_train, y_test = train_test_split(positif_index[0].values,positif_index[1].values,test_size=0.05,shuffle=False)
# annmodelpositif = Sequential([
#     # Dense(2, activation='relu', input_shape=(2,)),
#     Dense(5, activation='relu', input_shape=(5,)),
#     Dense(9, activation='relu'),
#     Dense(1,),
# ])
# annmodelpositif.compile(optimizer='adam',
#             loss='mean_absolute_error',
#             metrics=['accuracy'])
# annmodelpositif.fit(X_train,y_train,validation_data=(X_test, y_test),batch_size=5, epochs=300)

# # Delete last joblib
# if os.path.isfile("annmodelpositif.h5"):
#     print("Joblib ANN positif ada")
#     os.remove("annmodelpositif.h5")
# else:
#     print("Joblib ANN positif tidak ada")

# # Dump it
# annmodelpositif.save("annmodelpositif.h5")

# #######-----ANN SEMBUH-----#########

# # Create dataframe
# sembuh_index = makeFeaturesFrame('sembuh')

# # Train the data
# X_train, X_test, y_train, y_test = train_test_split(sembuh_index[0].values,sembuh_index[1].values,test_size=0.05,shuffle=False)
# annmodelsembuh = Sequential([
#     # Dense(2, activation='relu', input_shape=(2,)),
#     Dense(5, activation='relu', input_shape=(5,)),
#     Dense(9, activation='relu'),
#     Dense(1,),
# ])
# annmodelsembuh.compile(optimizer='adam',
#             loss='mean_absolute_error',
#             metrics=['accuracy'])
# annmodelsembuh.fit(X_train,y_train,validation_data=(X_test, y_test),batch_size=5, epochs=300)

# # Delete last joblib
# if os.path.isfile("annmodelsembuh.h5"):
#     print("Joblib ANN sembuh ada")
#     os.remove("annmodelsembuh.h5")
# else:
#     print("Joblib ANN sembuh tidak ada")

# # Dump it
# annmodelsembuh.save("annmodelsembuh.h5")

print("--- %s seconds ---" % (time.time() - start_time))
