import { Component } from '@angular/core'; 

const SEARCHLIST = [ 
	{
		locName: 'CALIFFO',
		locImg: 'images/listing1.jpg',
		location:"Quartu Sant'Elena",
		rank:['fa-star','fa-star','fa-star','fa-star','fa-star-o'],
		rankGrade:'Fair',
		rankVal:'73',
		reviews:'3660',
		moreDealsFrom:'Love Holidays',
		priceVal:'55100',
		priceTotal:'110200',
		compareId:'compareDeals1',
		compLogo: 'images/comp_logo.png',
		optionsList : ['7 nights - Bed & Breakfast','Standard Room','Direct from STN','7 nights - Bed & Breakfast','Standard Room','Direct from STN'],		
		COMPARELIST:[
						{
								compLogo: 'images/comp_logo.png',		
								dealsDet: ['Double or Twin, Standard','Room Only','£326pp'],
							
						},
						{
								compLogo: 'images/comp_logo.png',		
								dealsDet: ['Double or Twin1, Standard1','Room Only1','£3pp'],
							
						}
		],
		
	},
	{
		locName: 'CALIFFO',
		locImg: 'images/listing2.jpg',
		location:"Quartu Sant'Elena",
		rank:['fa-star','fa-star','fa-star','fa-star-o','fa-star-o'],
		rankGrade:'Good',
		rankVal:'81',
		reviews:'4250',
		moreDealsFrom:'Love Holidays',
		priceVal:'60000',
		priceTotal:'120000',
		compareId:'compareDeals2',
		compLogo: 'images/comp_logo.png',
		optionsList : ['7 nights - Bed & Breakfast','Standard Room','Direct from STN','7 nights - Bed Breakfast','Standard Room','Direct from STN'],
		COMPARELIST:[
						{
								compLogo: 'images/comp_logo.png',		
								dealsDet: ['Double or Twin, Standard','Room Only','£326pp'],
							
						},
						{
								compLogo: 'images/comp_logo.png',		
								dealsDet: ['Double or Twin1, Standard1','Room Only1','£3pp'],
							
						}
		],
	}
];

const BOARDLIST = [
	{
		boardName:'Room only',
		boardPrice:'£435',
		boardId:'board1'
	},
	{
		boardName:'Half Board',
		boardPrice:'£435',
		boardId:'board2'
	},
	{
		boardName:'Self Catering',
		boardPrice:'£435',
		boardId:'board3'
	}
];

const STARLIST = [
	{
		starClass:['fa-star','fa-star','fa-star','fa-star','fa-star-o'],
		starPrice:'£435',
		starId:'star1'
	},
	{
		starClass:['fa-star','fa-star','fa-star','fa-star-o','fa-star-o'],
		starPrice:'£435',
		starId:'star2'
	},
	{
		starClass:['fa-star','fa-star','fa-star-o','fa-star-o','fa-star-o'],
		starPrice:'£435',
		starId:'star3'
	},
	{
		starClass:['fa-star','fa-star','fa-star-o','fa-star-o','fa-star-o'],
		starPrice:'£435',
		starId:'star4'
	}
];

@Component({
  moduleId: module.id,
  selector: 'listing-path',
  templateUrl: './listing.component.html'
})

export class ListingComponent{
	public hotelLoc:string = 'Capo Testa';
	startDt = '19th Dec';
	endDt = '26th Dec';
	propVal = '6';
	dealVal = '8';
	sortList = ['Price (Low to High)', 'Price (High to Low)', 'Availability'];
	priceList = ['£PP','Total'];
	
	searchList = SEARCHLIST;
	boardList = BOARDLIST;
	starList = STARLIST;
}
