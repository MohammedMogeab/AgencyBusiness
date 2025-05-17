<?php

namespace Core;

use PayPalCheckoutSdk\Core\PayPalHttpClient;
use PayPalCheckoutSdk\Core\SandboxEnvironment;

class PayPalClient {
    public static function client() {
        return new PayPalHttpClient(
            new SandboxEnvironment("AXeB3F7H16G1Lx3hvUktkFn-dDDlRqrPm63x9ZoM5-SWFq4mTdRdCEQoi__eHE775zipU9FIFZhbB-Jm", "ED4cojzvAoFlH4Q-KCNkmnBGxyXoRtX5e8TTM2Tk-NqCU9EPOMzE23L4_WE8VcvVNru1vTDgdyRRYCoL")
        );
    }
}
