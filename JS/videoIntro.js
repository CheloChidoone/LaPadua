$(function(){
  $("#P1").YTPlayer({
      videoURL:'https://www.youtube.com/watch?v=nFbg6k-VzTw',
      containment:'#video',
      startAt:0,
      mute:true,
      optimizeDisplay: false,
      loop:false,
      opacity:.8, 
      useOnMobile: true,
      realfullscreen: false, 
      showYTLogo: false, 
      addRaster: false, 
      playOnlyIfVisible: true});
});