// "1234567".commafy() returns "1,234,567"
String.prototype.commafy = function() {
  return this.replace(/(.)(?=(.{3})+$)/g,"$1,")
}
