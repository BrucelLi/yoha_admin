import config from '../config';

export default {
    methods: {
        istest($msg) {
            let $res = $msg + config.fcTest;
            return $res;
        },
    }
}