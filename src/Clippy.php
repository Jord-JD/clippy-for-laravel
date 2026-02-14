<?php

namespace JordJD\ClippyForLaravel;

class Clippy
{
    private $expression;

    public function __construct(string $expression)
    {
        $this->expression = $expression;
    }

    public function render()
    {
        return '
                <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/gh/smore-inc/clippy.js@master/build/clippy.css" media="all">
                <script src="https://code.jquery.com/jquery-1.7.min.js"></script>
                <script src="https://cdn.jsdelivr.net/gh/smore-inc/clippy.js@master/build/clippy.min.js"></script>
                <script>
                    $(document).ready(function() {
                        clippy.load(\'Clippy\', function(agent){
                            agent.show();
                            agent.animate();
                            agent.speak(\'<?php echo with('.$this->expression.') ?>\');
                            agent.animate();
                        });
                    });
                </script>
            ';
    }
}