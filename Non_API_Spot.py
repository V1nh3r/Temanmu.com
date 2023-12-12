import pyautogui
import time
import subprocess


# Open Spotify application
subprocess.Popen(["start", "spotify"], shell=True)

# Wait for Spotify to open (adjust sleep duration as needed)
time.sleep(5)

# Use Ctrl+L to focus on the search bar
pyautogui.hotkey('ctrl', 'l')

# Type the search query (e.g., 'Counting Stars')    
pyautogui.write('Never Gonna Give You Up', interval=0.2)

# Press Enter to perform the search
pyautogui.press('enter')

# Wait for search results to load (adjust sleep duration as needed)
time.sleep(2)

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
