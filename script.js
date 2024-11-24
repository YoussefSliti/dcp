const tab_photos = [
    '../../public/photo1.jpg',
    '../../public/photo2.jpg',
    '../../public/photo4.jpg',
    '../../public/photo5.jpg',
    '../../public/photo6.jpg',
    '../../public/photo7.jpg'
  ];

function swapImages() {
    let currentIndex = 0;
    const mainBanner = document.getElementById('main-banner');
  
    setInterval(() => {
      currentIndex = (currentIndex + 1) % tab_photos.length
      mainBanner.src = tab_photos[currentIndex];
    }, 8000); 
  }

swapImages();

