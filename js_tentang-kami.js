function toggleAnswer(soal) {
    var answer = soal.querySelector('.answer');
    if (answer.style.display === 'block') {
      answer.style.display = 'none';
    } else {
      answer.style.display = 'block';
    }
  }
  