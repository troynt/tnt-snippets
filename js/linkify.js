String.prototype.linkify_plain = function() {
  return this.replace(/\b((?:https?|ftp|telnet|ldap):\/\/[^\s'"<>()]*|[-\w]+@(?:[-\w]+\.)+[\w]{2,6})\b|([\w\-])+(\.([\w\-])+)*@((([a-zA-Z0-9])+(([\-])+([a-zA-Z0-9])+)*\.)+([a-zA-Z])+(([\-])+([a-zA-Z0-9])+)*)/gi,'<a target="_blank" href="$1">$1</a>');
}