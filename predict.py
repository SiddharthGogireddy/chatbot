import joblib
import json
import numpy as np
import sys
import os

# Define absolute path to model files
BASE_DIR = os.path.dirname(os.path.abspath(__file__))
MODEL_PATH = os.path.join(BASE_DIR, "career_prediction_model.pkl")
ENCODER_PATH = os.path.join(BASE_DIR, "label_encoder.pkl")

# Load model and label encoder
try:
    model = joblib.load(MODEL_PATH)
    label_encoder = joblib.load(ENCODER_PATH)
except Exception as e:
    print(json.dumps({"error": f"Failed to load model: {str(e)}"}))
    sys.exit()

# Skill mapping
skill_mapping = {"Not Interested": 0, "Poor": 1, "Beginner": 2, "Average": 3, "Intermediate": 4, "Professional": 5}

# Read user input
try:
    input_data = json.loads(sys.stdin.read())
    features = [skill_mapping.get(input_data[skill], 0) for skill in input_data]
except Exception as e:
    print(json.dumps({"error": f"Invalid input: {str(e)}"}))
    sys.exit()

# Predict career path
try:
    pred_probs = model.predict_proba([features])[0]
    top_indices = np.argsort(pred_probs)[-3:][::-1]
    top_careers = [label_encoder.inverse_transform([idx])[0] for idx in top_indices]
    print(json.dumps({"predictions": top_careers}))
except Exception as e:
    print(json.dumps({"error": f"Prediction failed: {str(e)}"}))
    sys.exit()
