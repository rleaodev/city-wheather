class View
{
    constructor() {
        this._el;
    }

    setElement(el) {
        this._el = el;
    }

    render(html) {
        this._el.innerHTML = html;
    }
}