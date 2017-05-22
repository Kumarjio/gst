import { Component, AfterViewInit } from '@angular/core';
declare var $:any;
@Component({
  selector: 'my-app',
  template: `<header-path></header-path><listing-path></listing-path><footer-path></footer-path>`,
})
export class AppComponent  implements AfterViewInit{
	ngAfterViewInit() {
		$.getScript('./app/js/custom.js');		
    }
}
