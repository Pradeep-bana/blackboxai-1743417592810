// WebRTC Configuration
const configuration = {
  iceServers: [
    { urls: 'stun:stun.l.google.com:19302' }
  ]
};

// DOM Elements
const startCallBtn = document.getElementById('startCall');
const endCallBtn = document.getElementById('endCall');
const muteMicBtn = document.getElementById('muteMic');
const audioVisualizer = document.getElementById('audioVisualizer');

// Audio Context Setup
const audioContext = new (window.AudioContext || window.webkitAudioContext)();
const analyser = audioContext.createAnalyser();
analyser.fftSize = 256;
const bufferLength = analyser.frequencyBinCount;
const dataArray = new Uint8Array(bufferLength);
const canvasCtx = audioVisualizer.getContext('2d');

// Visualization Function
function visualizeAudio() {
  requestAnimationFrame(visualizeAudio);
  analyser.getByteFrequencyData(dataArray);
  
  canvasCtx.fillStyle = 'rgb(31, 41, 55)';
  canvasCtx.fillRect(0, 0, audioVisualizer.width, audioVisualizer.height);
  
  const barWidth = (audioVisualizer.width / bufferLength) * 2.5;
  let x = 0;
  
  for(let i = 0; i < bufferLength; i++) {
    const barHeight = dataArray[i] / 2;
    canvasCtx.fillStyle = `rgb(59, 130, 246)`;
    canvasCtx.fillRect(x, audioVisualizer.height - barHeight, barWidth, barHeight);
    x += barWidth + 1;
  }
}

// WebRTC Variables
let localStream;
let peerConnection;
let isMuted = false;

// Event Listeners
startCallBtn.addEventListener('click', startCall);
endCallBtn.addEventListener('click', endCall);
muteMicBtn.addEventListener('click', toggleMute);

// Initialize
function init() {
  visualizeAudio();
}

// Call Functions
async function startCall() {
  try {
    localStream = await navigator.mediaDevices.getUserMedia({ audio: true });
    const audioTracks = localStream.getAudioTracks();
    if (audioTracks.length > 0) {
      analyser.connect(audioContext.createMediaStreamSource(localStream));
    }

    // Create peer connection
    peerConnection = new RTCPeerConnection(configuration);
    localStream.getTracks().forEach(track => {
      peerConnection.addTrack(track, localStream);
    });

    // UI Updates
    startCallBtn.classList.add('hidden');
    endCallBtn.classList.remove('hidden');
    
    // TODO: Implement signaling for peer connection
    console.log('Call started - signaling not implemented yet');
    
  } catch (err) {
    console.error('Error starting call:', err);
    alert('Could not access microphone. Please check permissions.');
  }
}

function endCall() {
  if (peerConnection) {
    peerConnection.close();
    peerConnection = null;
  }
  
  if (localStream) {
    localStream.getTracks().forEach(track => track.stop());
    localStream = null;
  }
  
  startCallBtn.classList.remove('hidden');
  endCallBtn.classList.add('hidden');
}

function toggleMute() {
  if (localStream) {
    isMuted = !isMuted;
    localStream.getAudioTracks().forEach(track => {
      track.enabled = !isMuted;
    });
    muteMicBtn.innerHTML = isMuted 
      ? '<i class="fas fa-microphone-slash text-xl"></i>' 
      : '<i class="fas fa-microphone text-xl"></i>';
  }
}

// Initialize when page loads
window.onload = init;