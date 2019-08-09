var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __param = (this && this.__param) || function (paramIndex, decorator) {
    return function (target, key) { decorator(target, key, paramIndex); }
};
System.register("utils/User", ["reflect-metadata"], function (exports_1, context_1) {
    "use strict";
    var requiredMetadataKey, User;
    var __moduleName = context_1 && context_1.id;
    function required(target, propertyKey, parameterIndex) {
        var existingRequiredParameters = Reflect.getOwnMetadata(requiredMetadataKey, target, propertyKey) || [];
        existingRequiredParameters.push(parameterIndex);
        Reflect.defineMetadata(requiredMetadataKey, existingRequiredParameters, target, propertyKey);
    }
    function validate(target, propertyName, descriptor) {
        var method = descriptor.value;
        descriptor.value = function () {
            var requiredParameters = Reflect.getOwnMetadata(requiredMetadataKey, target, propertyName);
            if (requiredParameters) {
                for (var _i = 0, requiredParameters_1 = requiredParameters; _i < requiredParameters_1.length; _i++) {
                    var parameterIndex = requiredParameters_1[_i];
                    if (parameterIndex >= arguments.length || arguments[parameterIndex] === undefined) {
                        throw new Error("Missing required argument.");
                    }
                }
            }
            return method.apply(this, arguments);
        };
    }
    return {
        setters: [
            function (_1) {
            }
        ],
        execute: function () {
            requiredMetadataKey = "required";
            User = (function () {
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
                ], User.prototype, "setName");
                return User;
            }());
        }
    };
});
//# sourceMappingURL=tsc.js.map