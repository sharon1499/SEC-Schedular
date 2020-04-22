const mongoose = require("mongoose");
const Schema = mongoose.Schema;

let nameSchema = new Schema({
	firstName: {type: String, required: true, max: 50},
    lastName: {type: String, required: true, max: 50},
    Room: {type: Number, required: true},
    done: {type: Boolean, required: true}
});

module.exports = mongoose.model('User', nameSchema);