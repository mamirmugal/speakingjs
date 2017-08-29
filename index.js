Number.prototype.called = function () {
    'use strict';
    console.log(this.toString())
    console.log(this.valueOf())
}

123..called();