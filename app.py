from flask import Flask, render_template,  request
import nltk
from nltk.stem.porter import PorterStemmer
from nltk.corpus import stopwords
import pickle
import numpy as np
import re





app = Flask(__name__)

# load data trained model and vectorizer
with open('model.pickle', 'rb') as file:
    model = pickle.load(file)

with open('vectorizer.pickle', 'rb') as vectorizer_file:
    vectorizer = pickle.load(vectorizer_file)

with open('port_stem.pickle', 'rb') as stemmer_file:
    port_stem = pickle.load(stemmer_file)   

def stemming(text):
    stemmed_content = re.sub('[^a-zA-Z]',' ',text)
    stemmed_content = stemmed_content.lower()
    stemmed_content = stemmed_content.split()
    stemmed_content = [port_stem(word) for word in stemmed_content if  word not in stopwords('english')]
    return stemmed_content 
@app.route('/', method=['GET'])
def index():
    return
render_template('index.html')

@app.route('/predict', method=['POST'])
def predict():
    def predict_spam(new_email):
    preprocessed_email = preprocess_email(new_email)
    email_features = vectorizer.transform([preprocessed_email]).toarray()
    prediction = model.predict(email_features)
    if prediction[0] == 1:
        return "this email is SPAM."
    else:
        return "this email is NOT SPAM."
    return
    render_template('index.html',prediction_text=result)

if __name__ == '_main_':
    app.run(debug=True)
