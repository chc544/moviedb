export default class Products {
    constructor(){
        this.data = {
            password: "MovDBAPI"
        }


        this.rootElem = document.querySelector('.products')
        this.filter = this.rootElem.querySelector('.filter');
        this.items = this.rootElem.querySelector('.items');

        this.nameSearch = this.filter.querySelector('.nameSearch');
    }


    async init () {
        this.nameSearch.addEventListener('input', () => {
            this.render();
        });

        await this.render();
    }

    async render () {
        const data = await this.getData();
        console.log(data);
        const row = document.createElement('div');
        row.classList.add('row', 'g-5');

        for (const item of data){
            const col = document.createElement('div');
            col.classList.add('col-md-6', 'col-lg-4', 'col-xl-3');

            col.innerHTML = `
                <div class="card shadow">
                    <img src="uploads/${item.movImg}">
                    <a href="mov.php?id=${item.movId}" class="btn btn-primary">${item.movName}</a>
                </div>
            `;

            row.appendChild(col);
        }


        this.items.innerHTML = '';
        this.items.appendChild(row);
    }

    async getData () {
        this.data.nameSearch = this.nameSearch.value;


        const response = await fetch('api.php', {
            method: "POST",
            body: JSON.stringify(this.data)
        });
        return await response.json();
    }
}