console.log("entrypoint");

class Logger {
    constructor(name) {
        this.name = name;
    }

    logger() {
        alert(this.name);
    }
}

var p = new Logger("This is now loading");
p.logger();