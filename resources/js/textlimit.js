function myFunction() {
    let text = document.getElementById('overflow_text')
    let toggle = document.getElementById('toggle_text')

    if (text.style.overflow == 'visible') {
      toggle.innerHTML = 'Read More'
      text.style.overflow = 'hidden'
      text.style.textOverflow = 'ellipsis'
      text.style.whiteSpace = 'nowrap'
    } else {
      toggle.innerHTML = 'Read Less'
      text.style.overflow = 'visible'
      text.style.textOverflow = 'string'
      text.style.whiteSpace = 'normal'
    }
  }
