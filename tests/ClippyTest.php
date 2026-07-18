<?php

namespace JordJD\ClippyForLaravel\Tests;

use JordJD\ClippyForLaravel\Clippy;
use PHPUnit\Framework\TestCase;

class ClippyTest extends TestCase
{
    public function testSpeechIsSafelyEncodedForJavaScript()
    {
        $encoded = Clippy::encodeSpeech('</script><b>"Clippy" & friends\'</b>');

        $this->assertSame(
            '"\\u003C\\/script\\u003E\\u003Cb\\u003E\\u0022Clippy\\u0022 \\u0026 friends\\u0027\\u003C\\/b\\u003E"',
            $encoded
        );
    }

    public function testRenderedDirectiveUsesPinnedAssetsAndRuntimeEncoding()
    {
        $rendered = (new Clippy('$helpText'))->render();

        $this->assertNotFalse(strpos($rendered, 'jquery@3.7.1'));
        $this->assertNotFalse(strpos($rendered, Clippy::CLIPPY_VERSION));
        $this->assertNotFalse(strpos($rendered, 'Clippy::encodeSpeech(with($helpText))'));
        $this->assertFalse(strpos($rendered, '@master'));
        $this->assertFalse(strpos($rendered, 'jquery-1.7'));
    }
}
