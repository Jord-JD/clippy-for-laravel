<?php

namespace JordJD\ClippyForLaravel;

class Clippy
{
    const CLIPPY_VERSION = '8bfd1f92c725c6bc3a435d538a77c3302b327c08';

    private $expression;

    public function __construct(string $expression)
    {
        $this->expression = $expression;
    }

    public function render()
    {
        return '
                <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/gh/clippyjs/clippy.js@'.self::CLIPPY_VERSION.'/build/clippy.css" media="all">
                <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
                <script src="https://cdn.jsdelivr.net/gh/clippyjs/clippy.js@'.self::CLIPPY_VERSION.'/build/clippy.min.js"></script>
                <script>
                    $(document).ready(function() {
                        clippy.load(\'Clippy\', function(agent){
                            agent.show();
                            agent.animate();
                            agent.speak(<?php echo \\JordJD\\ClippyForLaravel\\Clippy::encodeSpeech(with('.$this->expression.')); ?>);
                            agent.animate();
                        });
                    });
                </script>
            ';
    }

    /**
     * Encode speech as a JavaScript string without allowing HTML or script injection.
     *
     * @param mixed $speech
     * @return string
     */
    public static function encodeSpeech($speech)
    {
        $encoded = json_encode(
            (string) $speech,
            JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_AMP | JSON_HEX_QUOT
        );

        return $encoded === false ? '""' : $encoded;
    }
}
