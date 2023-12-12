from flask import Flask, render_template

app = Flask(__name__)

@app.route('/')
def index():
    return render_template('homepage.php')

@app.route('/run-script', methods=['POST'])
def run_script():
    import pyautogui
import time
import subprocess
import os



#Open Spotify application
spotify_path = r"C:\Users\user\Desktop\Spotify\Spotify.exe"

# Check if the Spotify executable exists at the specified path
if os.path.isfile(spotify_path):
    os.startfile(spotify_path)
else:
    print(f"Error: '{spotify_path}' does not exist.")




# Wait for Spotify to open (adjust sleep duration as needed)
time.sleep(5)

# Use Ctrl+L to focus on the search bar
pyautogui.hotkey('ctrl', 'l')

# Type the search query (e.g., 'Counting Stars')
pyautogui.write('Right Here Waiting', interval=0.1)

# Press Enter to perform the search
pyautogui.press('enter')

# Wait for search results to load (adjust sleep duration as needed)
time.sleep(2)

# Use PageDown to select the first search result
pyautogui.press('pagedown')

# Press Tab to move to the Play button
pyautogui.press('tab')

# Wait for the play button to be highlighted
time.sleep(0.5)

# Press Enter to play the selected song
pyautogui.press('enter')

# Press Enter again to confirm the selection and play the song
time.sleep(1)
pyautogui.press('enter')

# Optional: Add a delay before closing the script
time.sleep(5)

    return "Script executed", 200

if __name__ == '__main__':
    app.run(debug=True)
