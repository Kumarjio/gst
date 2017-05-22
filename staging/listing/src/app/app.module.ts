import { NgModule }      from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';
import { FormsModule }   from '@angular/forms';

import { AppComponent }  from './app.component';
import { ListingComponent } from './listing.component';
import { HeaderComponent } from './header.component';
import { FooterComponent } from './footer.component';

@NgModule({
	imports:      [ BrowserModule,FormsModule ],
	declarations: [ AppComponent,ListingComponent,HeaderComponent,FooterComponent ],
	bootstrap:    [ AppComponent ]
})
export class AppModule { }
