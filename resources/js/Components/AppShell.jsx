import { Link, usePage } from '@inertiajs/react';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';
import { faArrowRight, faBell, faBookOpen, faCompass, faHouse, faLayerGroup, faUserCircle } from '@fortawesome/free-solid-svg-icons';

export function Brand({ compact = false }) {
    return <span className={`brand-logo-wrap${compact ? ' brand-logo-compact' : ''}`}>
        <img className="brand-logo brand-logo-landscape" src="/assets/images/bisa_logo_landscape.png" alt="BISA" />
        <img className="brand-logo brand-logo-portrait" src="/assets/images/bisa_logo_potrait.png" alt="BISA" />
    </span>;
}

export default function AppShell({ children, padded = true }) {
    const { auth } = usePage().props;
    return <div className="min-h-screen bg-paper">
        <header className="site-header">
            <Link href="/" className="brand" aria-label="BISA beranda"><Brand /></Link>
            <nav className="desktop-nav">
                <Link href="/skills">Explore skill</Link><a href="#how-it-works">Cara kerja</a><a href="#community">Komunitas</a>
            </nav>
            <div className="header-actions">
                {auth?.user ? <><Link href="/dashboard" className="icon-button" title="Notifikasi"><FontAwesomeIcon icon={faBell} /></Link><Link href="/dashboard" className="avatar">{auth.user.name?.charAt(0) || 'A'}</Link></> : <><Link href="/login" className="login-link">Masuk</Link><Link href="/register" className="button button-dark button-small">Mulai gratis <FontAwesomeIcon icon={faArrowRight} /></Link></>}
            </div>
        </header>
        <main className={padded ? 'page-container' : ''}>{children}</main>
        <footer className="site-footer"><div className="brand"><Brand /></div><span>Belajar yang jadi peluang.</span><span>© 2026 BISA</span></footer>
    </div>;
}

export function Sidebar() {
    const links = [[faHouse, 'Overview', '/dashboard'], [faCompass, 'Explore skill', '/skills'], [faBookOpen, 'Learning path', '/dashboard'], [faLayerGroup, 'Portfolio', '/dashboard']];
    return <aside className="dashboard-sidebar"><Link href="/" className="brand" aria-label="BISA beranda"><Brand compact /></Link><div className="sidebar-links">{links.map(([icon, label, href]) => <Link key={label} href={href} className={label === 'Overview' ? 'active' : ''}><FontAwesomeIcon icon={icon} />{label}</Link>)}</div><div className="sidebar-bottom"><div className="sidebar-note"><strong>Butuh arah?</strong><span>Temukan skill yang cocok untukmu.</span><Link href="/skills">Lihat rekomendasi <FontAwesomeIcon icon={faArrowRight} /></Link></div><Link href="/dashboard" className="user-mini"><span className="avatar">A</span><span><strong>Alya Pratama</strong><small>Free member</small></span><FontAwesomeIcon icon={faUserCircle} /></Link></div></aside>;
}