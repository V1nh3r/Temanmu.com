import spotipy
from spotipy.oauth2 import SpotifyOAuth
from spotipy.exceptions import SpotifyException
import pyautogui
import os
import time
import subprocess
import sys
import io

sys.stdout = io.TextIOWrapper(sys.stdout.buffer, encoding='utf-8')

CLIENT_ID = "49a878b4530d41988b08eb2660944896"
CLIENT_SECRET = "473f360b2ae14c39993b71b8b2acca55"
REDIRECT_URI = "http://localhost:5000/callback"  # Replace with your redirect URI

scope = "playlist-read-private,playlist-read-collaborative,streaming,user-read-playback-state"

sp = spotipy.Spotify(auth_manager=SpotifyOAuth(client_id=CLIENT_ID,
                                               client_secret=CLIENT_SECRET,
                                               redirect_uri=REDIRECT_URI,
                                               scope=scope))


def get_playlists():
    # Get user's playlists
    playlists = sp.user_playlists(user=sp.current_user()['id'])
    for playlist in playlists['items']:
        print(f"Playlist: {playlist['name']}")
        print(f"ID: {playlist['id']}")


def play_playlist(playlist_id):
    try:
        sp.start_playback(context_uri=f"spotify:playlist:{playlist_id}")
    except SpotifyException as e:
        print(f"Error playing playlist: {e}")


def pause_playback():
    try:
        sp.pause_playback()
    except SpotifyException as e:
        print(f"Error pausing playback: {e}")


def get_current_playback():
    try:
        playback = sp.current_playback()
        if playback:
            item = playback['item']
            print(f"Currently playing: {item['name']} by {item['artists'][0]['name']}")
        else:
            print("No music currently playing.")
    except SpotifyException as e:
        print(f"Error getting playback info: {e}")


def search_playlists(query):
    try:
        results = sp.search(q=query, type="playlist")
        for item in results['playlists']['items']:
            print(f"Playlist: {item['name']}")
            print(f"ID: {item['id']}")
    except SpotifyException as e:
        print(f"Error searching playlists: {e}")


def main():
    # Get user's playlists
    get_playlists()

    # Play a playlist
    play_playlist("5yhIe2XxqWwfGOFE4dNIWv")

    # To test, comment out the pause function or add a delay
    # time.sleep(10)
    # pause_playback()

    # Get current playback information
    get_current_playback()

    # Search for playlists
    search_playlists("chill music")

    # Open Spotify application
    subprocess.Popen(["start", "spotify"], shell=True)

    # Wait for Spotify to open (adjust sleep duration as needed)
    time.sleep(1)

    # Use Ctrl+L to focus on the search bar
    pyautogui.hotkey('ctrl', 'l')

    # Type the search query (e.g., 'Right Here Waiting')
    pyautogui.write(' ', interval=0.1)

    # Press Enter to perform the search
    pyautogui.press('enter')

    # Wait for search results to load (adjust sleep duration as needed)
    time.sleep(2)

    # Use PageDown to select the first search result
    pyautogui.press('pagedown')

    # Press Tab to move to the Play button
    pyautogui.press('tab')

    # Press Enter to play the selected song
    pyautogui.press('enter')

    # Optional: Add a delay before closing the script
    time.sleep(5)


if __name__ == "__main__":
    main()



print(f"Playlists: {playlist['name'].encode('utf-8')}")
