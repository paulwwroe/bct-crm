class Note {

	constructor(notes) {
		
        this.defaults = {
            user: 'anyone',
            groupByClient: false,
			range: {
				from: new Date('01/01/1970'),
				to: new Date()
			}
		};

		this.today = new Date;

		this.notes = notes;

		this.filter(this.defaults);

	}

	filter(filters) {

		if (filters.range) {
			let range = this.getDateRange(filters.date);
		} else {
			let range = this.defaults.range;
		}

		for (let note of this.notes) {

			let noteDate = new Date(note.getAttribute('data-date'));

			if (noteDate > range.from && noteDate < range.from) {
				note.style.display = 'block';
			} else {
				note.style.display = 'none';
			}

		}

	}

	getDateRange(period) {

		let range = {};

		switch (period) {

    		case 'today':
    			range.from = new Date(this.today.setHours(0,0,0,0));
    			range.to = new Date(this.today.setHours(23,59,59,999));
    		break;

    		case 'yesterday':
    			this.today.setHours(0,0,0,0);
    			range.from = new Date(this.today.setDate(this.today.getDate()-1));
    			this.today.setHours(23,59,59,999);
    			range.to = this.today;
    		break;

    		case 'this-week':
    			this.today.setHours(0,0,0,0);
    			range.from = new Date(this.today.setDate(this.today.getDate() - this.today.getDay()+1));
    			this.today.setHours(23,59,59,999);
    			range.to = new Date(this.today.setDate(this.today.getDate() - this.today.getDay()+7));
    		break;

    		case 'last-week':
    			this.today.setHours(0,0,0,0);
    			range.from = new Date(this.today.setDate(this.today.getDate() - this.today.getDay() - 6));
    			this.today.setHours(23,59,59,999);
    			range.to = new Date(this.today.setDate(this.today.getDate() - this.today.getDay() + 7));
    		break;

    		case 'this-month':
    			range.from = new Date(this.today.getFullYear(), this.today.getMonth(), 1, 0,0,0,0);
    			range.to = new Date(this.today.getFullYear(), this.today.getMonth()+1, 0, 23,59,59,999);
    		break;

    		case 'last-month':
    			range.from = new Date(this.today.getFullYear(), this.today.getMonth()-1, 1, 0,0,0,0);
    			range.to = new Date(this.today.getFullYear(), this.today.getMonth(), 0, 23,59,59,999);
    		break;

    		case 'this-year':
    			range.from = new Date(this.today.getFullYear(), 0, 1, 0,0,0,0);
    			this.today.setHours(23,59,59,999);
    			range.to = this.today;
    		break;

    		case 'last-year':
    			range.from = new Date(this.today.getFullYear()-1, 0, 1, 0,0,0,0);
    			range.to = new Date(this.today.getFullYear()-1, 11, 31, 23,59,59,999);
    		break;

    	}

    	return range;

	}

}