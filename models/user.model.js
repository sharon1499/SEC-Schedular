const mongoose = require("mongoose");
const Schema = mongoose.Schema;

let nameSchema = new Schema({
	first: {type: String, required: true, max: 50},
    last: {type: String, required: true, max: 50},
    room: {type: Number, required: true},
    done: {type: Boolean, required: true}
});

module.exports = mongoose.model('User', nameSchema);