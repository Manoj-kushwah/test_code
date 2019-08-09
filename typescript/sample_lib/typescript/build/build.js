var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __param = (this && this.__param) || function (paramIndex, decorator) {
    return function (target, key) { decorator(target, key, paramIndex); }
};
var User = /** @class */ (function () {
    function User() {
    }
    User.prototype.getName = function () {
        return this.name;
    };
    User.prototype.setName = function (v) {
        this.name = v;
    };
    User.prototype.toString = function () {
        return '[object User]';
    };
    __decorate([
        validate,
        __param(0, required)
    ], User.prototype, "setName", null);
    return User;
}());
//# sourceMappingURL=build.js.map