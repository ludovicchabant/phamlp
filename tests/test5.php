<?php

include "test_inc.php";

//test issue 54
$source = <<<END

\$test-var: 1;

@mixin catch-my-error(\$align: right) {
	\$align: unquote(\$align);
	@if \$align == right {
		.test-right-cls {
			text-align: right;
        }
    }
	@else if \$align == left {
		.test-left-cls {
			text-align: left;
        }
    }
}

.cls-1 {
	@include catch-my-error(right);
}
.cls-2 {
	@include catch-my-error(left);
}
.cls-3 {
	@if \$test-var == 2 {
		padding: 10px;
    }
	@else if \$test-var == 1 {
		.test-1-cls {
			padding: 0;
        }
    }
}


END;

echo '<pre>'.$sass->toCss($source, false).'</pre>';