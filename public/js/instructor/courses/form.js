let titleInput = document.getElementById("title");
let slugInput = document.getElementById("slug");
let imgInput = document.getElementById("file");
let img = document.getElementById('picture');

//Functions

const slugChange = () => {
    slugInput.value = slug(titleInput.value)
}

const slug = (str) => {
    let slugResult = '';
    let trimmed = str.trim(str);
    slugResult = trimmed.replace(/[^a-z0-9-]/gi, '-').replace(/-+/g, '-').replace(/^-|-$/g, '');
    return slugResult.toLowerCase();

}

const changeImg = (e) => {
    let file = e.target.files[0];

    let reader = new FileReader();

    reader.onload = (e) => {
        img.setAttribute('src', e.target.result)
    }

    reader.readAsDataURL(file);
}


//Adding listeners

titleInput.addEventListener('keyup', slugChange);
imgInput.addEventListener('change', changeImg);

//ckEditor

ClassicEditor
    .create(document.querySelector('#description'), {
        toolbar: ['heading', '|', 'bold', 'italic', 'link', 'blockQuote'],
        heading: {
            options: [
                { model: 'paragraph', title: 'Párrafo', class: 'ck-heading_paragraph' },
                { model: 'heading1', view: 'h1', title: 'Encabezado 1', class: 'ck-heading_heading1' },
                { model: 'heading2', view: 'h2', title: 'Encabezado 2', class: 'ck-heading_heading2' }
            ]
        }
    })
    .catch(error => {
        console.error(error);
    });