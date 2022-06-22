    
         
      // selecting the header element
      let page_head  = document.querySelector('head');

    // creating a link element and adding it to the head 
    let favicon  = document.createElement('link');
    favicon.setAttribute('href' , '/utilities/logos/real_talk_logo.jpg');
    favicon.setAttribute('rel' , 'shortcut icon');

    page_head.appendChild(favicon);

    // favicon link created and appended successfully
