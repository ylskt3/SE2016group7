{
    "life_periods" : {
    	{
            "name"      : "Childhood",
            "start_age" : 0,
            "end_age"   : 18,
            "period_id" : "adslkjf09u2jr"
        }
    },

    "Person_as_PS" : {
    	"user1" : {
    		"lname" : "Doe",
    		"fname" : "Jone",
    		"birthdate" : 10-21-2000
    	},
    	"user2" : {
    		"lname" : "Doe",
    		"fname" : "Jone",
    		"birthdate" : 10-21-2000}
    	}

    }

	"User as U" : {
		"user1" : {
			"permission_level" : 1,
			"username" : "test",
			"password" : "pass",
			"email" : "a@b.c",
			"date_joined" : “10-31-2015”}
		}

	"Non_User as NU" : {
		// "user1" : {
		// 	"is_dead" : "true",
		// 	"deathdate" : "11-31-2015"
		// }
		// "user2" : {
		// 	"is_dead" : "false",
		// 	"deathdate" : NULL
		// }

		People : [
		{
			"is_user" : false,
			
		}



		]
	}

	"user_activity as UAC" : {
		"ac_id" : auto_increatment,
		"ac_type" : "adfjkla"
	}

	"photograph_tag as PHT" : {
		"user1" : {
			"time_tagged" : "adfa"
		}
	}

	"Log as L" : {
		"user1" : {
			"lo_id" : auto_increatment,
			"time_logged" : system time,
			"is_A" : 0
		}

		"user2" : {
			"lo_id" : auto_increatment,
			"time_logged" : system time,
			"is_A" : 1
		}

	}

	"Session Log as SL" : {
		"user1" : {
			"log_in_time" : system time,
			"log_out_time" : system time
		}

		"user2" : {
			"log_in_time" : system time,
			"log_out_time" : system time
		}

	}

	"Activity Log as AL" : {
		"user1" : {
			"activity_type" : "adfaf",
			"r_id" : auto_increatment,
			"p_id" : auto_increatment,
			"s_id" : auto_increatment
		}

		"user2" : {
			"activity_type" : "adfaf",
			"r_id" : auto_increatment,
			"p_id" : auto_increatment,
			"s_id" : auto_increatment
		}
	}
  "Loacaton as LOC":{
    "location1":{
    "country" : "U.S.",
    "state" :  "MO",
    "zip" :"65201",
    "address" : "3101 old 63 south"
  }
  "location2":{
  "country" : "U.S.",
  "state" :  "MO",
  "zip" :"65201",
  "address" : "3101 old 63 south"
}
"location3":{
"country" : "U.S.",
"state" :  "MO",
"zip" :"65201",
"address" : "3101 old 63 south"
}
  }

  "story as S"  :{
    "story1" : {
      "title" : "with family",
      "description" : "dining"
    }
    "story2" : {
      "title" : "with family",
      "description" : "lunch"
    }
  }

}
