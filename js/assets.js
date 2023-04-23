const navtab = document.getElementsByClassName('nav-item')
const content = document.getElementsByClassName('code-group-item')

class CodeTemplate extends HTMLElement {
    constructor() {
        super()
    }
    connectedCallback() {
        this.innerHTML = `
        <div class="code-wrapper">
            <div class="navbar">
                <ul>
                    <li>
                        <button class="nav-item active">
                            with js
                        </button>
                    </li>
                    <li>
                        <button class="nav-item">
                            with php
                        </button>
                    </li>
                </ul>
            </div>
            <div class="content">
                <div class="code-group-item active">
                    <div class="language-bash ext-sh">
                        <code>
                            <span>npm install</span>
                            discord.js
                        </code>
                    </div>
                </div>
                <div class="code-group-item">
                    <div class="language-bash ext-sh">
                        <code>
                            <span>PHP WORDS</span> WORDS <span>WORDS</span>
                        </code>
                    </div>
                </div>
            </div>
        </div>`
        for (let i = 0; i < navtab.length; i++) {
            for (let k = 0; k < content.length; k++) {
                if (!navtab[i].className.includes('active')) {
                    navtab[i].onclick = function () {
                        for (let a = 0; a < navtab.length; a++) {
                            navtab[a].className = 'nav-item'
                            navtab[i].className = 'nav-item active'
                            for (let c = 0; c < content.length; c++) {
                                content[c].className = 'code-group-item'
                                content[k].className = 'code-group-item active'
                            }
                        }
                    }
                } else {
                    if (content[k].className.includes('active')) {
                        navtab[i].onclick = function () {
                            for (let b = 0; b < navtab.length; b++) {
                                navtab[b].className = 'nav-item'
                                navtab[i].className = 'nav-item active'
                                for (let d = 0; d < content.length; d++) {
                                    content[d].className = 'code-group-item'
                                    content[k].className =
                                        'code-group-item active'
                                }
                            }
                        }
                    }
                }
            }
        }
    }
}
// class DropdownElement extends HTMLElement {
//     constructor() {
//         super();
//     }
//     connectedCallback() {
//         this.innerHTML = `
//             <ul>
//                 <div class="dropdown-wrapper">
//                     <div class="dropdown">
//                         <li class="dropdown-item">
//                             <a>James' Dropdown</a>
//                             <div class="menu">
//                                 <p>DROPDOWN THINGY</p>
//                             </div>
//                         </li>
//                     </div>
//                 </div>
//             </ul>
//         `
//     }
// }
customElements.define('code-template', CodeTemplate)
// customElements.define('dropdown-element', DropdownElement)
