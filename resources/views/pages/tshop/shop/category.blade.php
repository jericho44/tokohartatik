<div class="row">
    <div class="col-md-12">
        <div class="filter__menu__container">
            <div class="product__menu">
                <button data-filter="*" class="is-checked">All</button>
                <button data-filter=".cat--1">Furnitures</button>
                <button data-filter=".cat--2">Bags</button>
                <button data-filter=".cat--3">Decoration</button>
                <button data-filter=".cat--4">Accessories</button>
            </div>
            <div style="display: flex; align-content: flex-start">
                <label style="width: 100px; font-weight: normal">Sort By : </label>
                {{ Form::select('sort', $sorts , $selectedSort ,array('onChange' => 'this.options[this.selectedIndex].value &&
                                (window.location = this.options[this.selectedIndex].value);')) }}
            </div>
            <div class="filter__box">
                <a class="filter__menu" href="#">filter</a>
            </div>
        </div>
    </div>
</div>