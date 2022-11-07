/* Sub Code */
        (function($){
          $(".sbjsrch").on('keyup', function(e) {
            var $this = $(this);
            var exp = new RegExp($this.val(), 'i');
            $(".sbjlist div label").each(function() {
              var $self = $(this);
              if(!exp.test($self.text())) {
                $self.parent().hide();
              } else {
                $self.parent().show();
              }
            });
          });
        })(jQuery);
        
        
    /* Mentor */
    
        (function($){
          $(".mentsrch").on('keyup', function(e) {
            var $this = $(this);
            var exp = new RegExp($this.val(), 'i');
            $(".mentlist div label").each(function() {
              var $self = $(this);
              if(!exp.test($self.text())) {
                $self.parent().hide();
              } else {
                $self.parent().show();
              }
            });
          });
        })(jQuery);
        
   /* date */     
    
        (function($){
          $(".datesrch").on('keyup', function(e) {
            var $this = $(this);
            var exp = new RegExp($this.val(), 'i');
            $(".datelist div label").each(function() {
              var $self = $(this);
              if(!exp.test($self.text())) {
                $self.parent().hide();
              } else {
                $self.parent().show();
              }
            });
          });
        })(jQuery);
        
        /* University */
        
        (function($){
          $(".unisrch").on('keyup', function(e) {
            var $this = $(this);
            var exp = new RegExp($this.val(), 'i');
            $(".unilist div label").each(function() {
              var $self = $(this);
              if(!exp.test($self.text())) {
                $self.parent().hide();
              } else {
                $self.parent().show();
              }
            });
          });
        })(jQuery);
        
        /* Stream */
        
        (function($){
          $(".strmsrch").on('keyup', function(e) {
            var $this = $(this);
            var exp = new RegExp($this.val(), 'i');
            $(".strmlist div label").each(function() {
              var $self = $(this);
              if(!exp.test($self.text())) {
                $self.parent().hide();
              } else {
                $self.parent().show();
              }
            });
          });
        })(jQuery);
        
        /* Program */
        
        (function($){
          $(".progsrch").on('keyup', function(e) {
            var $this = $(this);
            var exp = new RegExp($this.val(), 'i');
            $(".proglist div label").each(function() {
              var $self = $(this);
              if(!exp.test($self.text())) {
                $self.parent().hide();
              } else {
                $self.parent().show();
              }
            });
          });
        })(jQuery);
        
        /* Branch */
        
        (function($){
          $(".brnsrch").on('keyup', function(e) {
            var $this = $(this);
            var exp = new RegExp($this.val(), 'i');
            $(".brnlist div label").each(function() {
              var $self = $(this);
              if(!exp.test($self.text())) {
                $self.parent().hide();
              } else {
                $self.parent().show();
              }
            });
          });
        })(jQuery);
        
        
        /* Semester */
        
        (function($){
          $(".semsrch").on('keyup', function(e) {
            var $this = $(this);
            var exp = new RegExp($this.val(), 'i');
            $(".semlist div label").each(function() {
              var $self = $(this);
              if(!exp.test($self.text())) {
                $self.parent().hide();
              } else {
                $self.parent().show();
              }
            });
          });
        })(jQuery);
    