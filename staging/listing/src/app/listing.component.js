"use strict";
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (this && this.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};
var core_1 = require('@angular/core');
var SEARCHLIST = [
    {
        locName: 'CALIFFO',
        locImg: 'images/listing1.jpg',
        location: "Quartu Sant'Elena",
        rank: ['fa-star', 'fa-star', 'fa-star', 'fa-star', 'fa-star-o'],
        rankGrade: 'Fair',
        rankVal: '73',
        reviews: '3660',
        moreDealsFrom: 'Love Holidays',
        priceVal: '55100',
        priceTotal: '110200',
        compareId: 'compareDeals1',
        compLogo: 'images/comp_logo.png',
        optionsList: ['7 nights - Bed & Breakfast', 'Standard Room', 'Direct from STN', '7 nights - Bed & Breakfast', 'Standard Room', 'Direct from STN'],
        COMPARELIST: [
            {
                compLogo: 'images/comp_logo.png',
                dealsDet: ['Double or Twin, Standard', 'Room Only', '£326pp'],
            },
            {
                compLogo: 'images/comp_logo.png',
                dealsDet: ['Double or Twin1, Standard1', 'Room Only1', '£3pp'],
            }
        ],
    },
    {
        locName: 'CALIFFO',
        locImg: 'images/listing2.jpg',
        location: "Quartu Sant'Elena",
        rank: ['fa-star', 'fa-star', 'fa-star', 'fa-star-o', 'fa-star-o'],
        rankGrade: 'Good',
        rankVal: '81',
        reviews: '4250',
        moreDealsFrom: 'Love Holidays',
        priceVal: '60000',
        priceTotal: '120000',
        compareId: 'compareDeals2',
        compLogo: 'images/comp_logo.png',
        optionsList: ['7 nights - Bed & Breakfast', 'Standard Room', 'Direct from STN', '7 nights - Bed Breakfast', 'Standard Room', 'Direct from STN'],
        COMPARELIST: [
            {
                compLogo: 'images/comp_logo.png',
                dealsDet: ['Double or Twin, Standard', 'Room Only', '£326pp'],
            },
            {
                compLogo: 'images/comp_logo.png',
                dealsDet: ['Double or Twin1, Standard1', 'Room Only1', '£3pp'],
            }
        ],
    }
];
var BOARDLIST = [
    {
        boardName: 'Room only',
        boardPrice: '£435',
        boardId: 'board1'
    },
    {
        boardName: 'Half Board',
        boardPrice: '£435',
        boardId: 'board2'
    },
    {
        boardName: 'Self Catering',
        boardPrice: '£435',
        boardId: 'board3'
    }
];
var STARLIST = [
    {
        starClass: ['fa-star', 'fa-star', 'fa-star', 'fa-star', 'fa-star-o'],
        starPrice: '£435',
        starId: 'star1'
    },
    {
        starClass: ['fa-star', 'fa-star', 'fa-star', 'fa-star-o', 'fa-star-o'],
        starPrice: '£435',
        starId: 'star2'
    },
    {
        starClass: ['fa-star', 'fa-star', 'fa-star-o', 'fa-star-o', 'fa-star-o'],
        starPrice: '£435',
        starId: 'star3'
    },
    {
        starClass: ['fa-star', 'fa-star', 'fa-star-o', 'fa-star-o', 'fa-star-o'],
        starPrice: '£435',
        starId: 'star4'
    }
];
var ListingComponent = (function () {
    function ListingComponent() {
        this.hotelLoc = 'Capo Testa';
        this.startDt = '19th Dec';
        this.endDt = '26th Dec';
        this.propVal = '6';
        this.dealVal = '8';
        this.sortList = ['Price (Low to High)', 'Price (High to Low)', 'Availability'];
        this.priceList = ['£PP', 'Total'];
        this.searchList = SEARCHLIST;
        this.boardList = BOARDLIST;
        this.starList = STARLIST;
    }
    ListingComponent = __decorate([
        core_1.Component({
            moduleId: module.id,
            selector: 'listing-path',
            templateUrl: './listing.component.html'
        }), 
        __metadata('design:paramtypes', [])
    ], ListingComponent);
    return ListingComponent;
}());
exports.ListingComponent = ListingComponent;
//# sourceMappingURL=listing.component.js.map