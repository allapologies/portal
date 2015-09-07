define(function($){
		

	function Textprocessor(str){
		this.str = str;
	};
	Textprocessor.prototype.setToLowerCase = function(){
		this.str = this.str.toLowerCase();
	};
	Textprocessor.prototype.setToUpperCase = function(){
		this.str = this.str.toUpperCase();
	};
	Textprocessor.prototype.getStr = function(){
		return this.str;
	};

	return Textprocessor;

});

