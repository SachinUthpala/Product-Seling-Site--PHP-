/*code for page animations */

const observer = new IntersectionObserver((entries) => {
    entries.forEach((entrie) => {
        console.log(entrie)
        if(entrie.isIntersecting){
            entrie.target.classList.add('showx');
        }else{
            entrie.target.classList.remove('showx');
        }
    });
})

const hiddenElementx = document.querySelectorAll('.hiddenx');
hiddenElementx.forEach((el) =>observer.observe(el))

/*end of the animation code */

const observery = new IntersectionObserver((entries) => {
    entries.forEach((entrie) => {
        console.log(entrie)
        if(entrie.isIntersecting){
            entrie.target.classList.add('showy');
        }else{
            entrie.target.classList.remove('showy');
        }
    });
})

const hiddenElementy = document.querySelectorAll('.hiddeny');
hiddenElementy.forEach((el) =>observery.observe(el))


/*end of the animation code */

const observerup = new IntersectionObserver((entries) => {
    entries.forEach((entrie) => {
        console.log(entrie)
        if(entrie.isIntersecting){
            entrie.target.classList.add('showup');
        }else{
            entrie.target.classList.remove('showup');
        }
    });
})

const hiddenElementup = document.querySelectorAll('.hiddenup');
hiddenElementup.forEach((el) =>observerup.observe(el))

