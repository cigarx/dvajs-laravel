import React, {Component, PropTypes} from 'react';
import styles from './profile.scss';
import {Icon} from 'antd';
import {Link} from 'dva/router';

export default class Profile extends Component {
    constructor(props) {
        super(props);
    }

    render() {
        const {user} = this.props;
        return (
            <div className={styles.profileBox}>
                <div className={styles.head}>
                    <Link to="/" className={styles.avatar}>
                        <img src={require('../assets/qbhy.png')}/>
                    </Link>
                    <h3 className={styles.name}>{user.name}</h3>
                </div>
                <div className={styles.actions}>
                    <a href="javascript:;" className={styles.subscribe}><Icon type="tag-o"/> 订阅</a>
                </div>
            </div>
        );
    }
}