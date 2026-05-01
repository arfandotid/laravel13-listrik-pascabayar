import { Head, Link, useForm } from "@inertiajs/react";
import LayoutApp from "@/Layouts/LayoutApp";
import { Save } from "lucide-react";
import PageHeader from "@/Shared/PageHeader";
import { Field, FieldDescription, FieldLabel } from "@/Components/ui/field";
import { Input } from "@/Components/ui/input";
import { Button } from "@/Components/ui/button";

export default function TarifsEdit({ tarif }) {
    const { data, setData, put, processing, errors } = useForm({
        daya: tarif.daya || "",
        tarifperkwh: tarif.tarifperkwh || "",
    });

    const handleSubmit = (e) => {
        e.preventDefault();
        put(`/admin/tarif/${tarif.id}`);
    };

    return (
        <>
            <Head title={"Edit Tarif"} />
            <LayoutApp>
                <PageHeader title="Edit Tarif" description="Edit data tarif" />

                <form onSubmit={handleSubmit}>
                    <div className="space-y-5">
                        <Field>
                            <FieldLabel>Daya</FieldLabel>
                            <Input
                                type="text"
                                value={data.daya}
                                onChange={(e) =>
                                    setData("daya", e.target.value)
                                }
                                className={`${errors.daya ? "border-red-500" : ""}`}
                            />
                            {errors.daya && (
                                <FieldDescription className="mt-1 text-sm text-red-600">
                                    {errors.daya}
                                </FieldDescription>
                            )}
                        </Field>
                        <Field>
                            <FieldLabel>Tarifperkwh</FieldLabel>
                            <Input
                                type="text"
                                value={data.tarifperkwh}
                                onChange={(e) =>
                                    setData("tarifperkwh", e.target.value)
                                }
                                className={`${errors.tarifperkwh ? "border-red-500" : ""}`}
                            />
                            {errors.tarifperkwh && (
                                <FieldDescription className="mt-1 text-sm text-red-600">
                                    {errors.tarifperkwh}
                                </FieldDescription>
                            )}
                        </Field>
                    </div>

                    <div className="flex justify-start space-x-2 pt-6">
                        <Button type="submit" disabled={processing}>
                            <Save />
                            {processing ? "Menyimpan..." : "Simpan"}
                        </Button>
                        <Link href="/admin/tarif">
                            <Button variant="outline">Batal</Button>
                        </Link>
                    </div>
                </form>
            </LayoutApp>
        </>
    );
}
