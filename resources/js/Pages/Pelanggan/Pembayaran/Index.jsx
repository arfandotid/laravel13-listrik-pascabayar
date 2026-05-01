import { Head, usePage } from "@inertiajs/react";
import LayoutApp from "@/Layouts/LayoutApp";
import PageHeader from "@/Shared/PageHeader";
import TableEmpty from "@/Shared/TableEmpty";
import Search from "@/Shared/Search";
import TablePagination from "@/Shared/TablePagination";
import {
    Table,
    TableHeader,
    TableRow,
    TableHead,
    TableBody,
    TableCell,
} from "@/Components/BasicTable";

export default function PembayaranIndex() {
    const { pembayaran } = usePage().props;

    return (
        <>
            <Head title={"Riwayat Pembayaran"} />
            <LayoutApp>
                <PageHeader
                    title="Riwayat Pembayaran"
                    description="Riwayat pembayaran"
                />

                <div className="space-y-5">
                    <Search URL={"/pembayaran"} />

                    <Table>
                        <TableHeader>
                            <TableRow>
                                <TableHead>No.</TableHead>
                                <TableHead>Pelanggan</TableHead>
                                <TableHead>Bulan bayar</TableHead>
                                <TableHead>Tgl Bayar</TableHead>
                                <TableHead>Biaya admin</TableHead>
                                <TableHead>Total bayar</TableHead>
                                <TableHead>Admin</TableHead>
                            </TableRow>
                        </TableHeader>
                        <TableBody>
                            {pembayaran && pembayaran.data.length > 0 ? (
                                pembayaran.data.map((item, index) => (
                                    <TableRow key={item.id}>
                                        <TableCell className="font-medium">
                                            {++index +
                                                (pembayaran.current_page - 1) *
                                                    pembayaran.per_page}
                                        </TableCell>
                                        <TableCell>
                                            {item.pelanggan.nama}
                                        </TableCell>
                                        <TableCell>
                                            {item.tanggal_pembayaran}
                                        </TableCell>
                                        <TableCell>
                                            {item.bulan_bayar}
                                        </TableCell>
                                        <TableCell>
                                            {item.biaya_admin}
                                        </TableCell>
                                        <TableCell>
                                            {item.total_bayar}
                                        </TableCell>
                                        <TableCell>{item.user.name}</TableCell>
                                    </TableRow>
                                ))
                            ) : (
                                <TableEmpty
                                    title="Tidak ada data"
                                    description="Silahkan tambahkan data baru"
                                    colSpan={7}
                                />
                            )}
                        </TableBody>
                    </Table>

                    <TablePagination links={pembayaran.links} />
                </div>
            </LayoutApp>
        </>
    );
}
